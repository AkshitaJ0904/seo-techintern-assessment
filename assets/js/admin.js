/**
 * Admin JavaScript file for Product Listing Platform
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize admin components
    initSidebar();
    initFormValidation();
    initDataTables();
    initSlugs();
    initDeleteConfirmation();
    initEditors();
    initColorPickers();
});

/**
 * Initialize sidebar toggle functionality
 */
function initSidebar() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            const sidebar = document.querySelector('.admin-sidebar');
            sidebar.classList.toggle('collapsed');
            
            // Toggle sidebar text visibility
            const sidebarTexts = document.querySelectorAll('.admin-nav-link span');
            sidebarTexts.forEach(text => {
                text.classList.toggle('d-none');
            });
        });
    }
}

/**
 * Initialize form validation for admin forms
 */
function initFormValidation() {
    const forms = document.querySelectorAll('.needs-validation');
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
}

/**
 * Initialize DataTables for admin tables
 */
function initDataTables() {
    const tables = document.querySelectorAll('.data-table');
    if (tables.length && typeof $.fn.DataTable !== 'undefined') {
        tables.forEach(table => {
            $(table).DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });
        });
    }
}

/**
 * Initialize slug generation from title input
 */
function initSlugs() {
    const titleInputs = document.querySelectorAll('.slug-source');
    
    titleInputs.forEach(input => {
        input.addEventListener('keyup', function() {
            const slugField = document.querySelector('.slug-target');
            if (slugField) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                
                slugField.value = slug;
            }
        });
    });
}

/**
 * Initialize delete confirmation modals
 */
function initDeleteConfirmation() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const itemId = this.getAttribute('data-id');
            const itemName = this.getAttribute('data-name');
            const itemType = this.getAttribute('data-type');
            const deleteUrl = this.getAttribute('href');
            
            const modal = document.getElementById('deleteModal');
            if (modal) {
                const modalBody = modal.querySelector('.modal-body');
                modalBody.textContent = `Are you sure you want to delete ${itemType} "${itemName}"? This action cannot be undone.`;
                
                const confirmBtn = modal.querySelector('#confirmDelete');
                confirmBtn.addEventListener('click', function() {
                    window.location.href = deleteUrl;
                });
                
                const deleteModal = new bootstrap.Modal(modal);
                deleteModal.show();
            } else {
                if (confirm(`Are you sure you want to delete ${itemType} "${itemName}"? This action cannot be undone.`)) {
                    window.location.href = deleteUrl;
                }
            }
        });
    });
}

/**
 * Initialize rich text editors for description fields
 */
function initEditors() {
    const editors = document.querySelectorAll('.rich-editor');
    if (editors.length && typeof ClassicEditor !== 'undefined') {
        editors.forEach(editor => {
            ClassicEditor
                .create(editor, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Type content here...'
                })
                .catch(error => {
                    console.error(error);
                });
        });
    }
}

/**
 * Initialize features management
 */
function addFeature() {
    const featureInput = document.getElementById('feature-input');
    const featuresList = document.getElementById('features-list');
    const featuresHidden = document.getElementById('features');
    
    if (featureInput && featuresList && featuresHidden) {
        const feature = featureInput.value.trim();
        
        if (feature) {
            // Create new feature item
            const featureItem = document.createElement('div');
            featureItem.className = 'feature-item mb-2 d-flex align-items-center';
            
            featureItem.innerHTML = `
                <span class="feature-text flex-grow-1">${feature}</span>
                <button type="button" class="btn btn-sm btn-outline-danger remove-feature">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            featuresList.appendChild(featureItem);
            featureInput.value = '';
            
            // Add event listener to remove button
            const removeButton = featureItem.querySelector('.remove-feature');
            removeButton.addEventListener('click', function() {
                featuresList.removeChild(featureItem);
                updateFeaturesHidden();
            });
            
            updateFeaturesHidden();
        }
    }
}

function updateFeaturesHidden() {
    const featuresItems = document.querySelectorAll('.feature-text');
    const featuresHidden = document.getElementById('features');
    
    if (featuresItems.length && featuresHidden) {
        const features = Array.from(featuresItems).map(item => item.textContent);
        featuresHidden.value = JSON.stringify(features);
    }
}

/**
 * Initialize color pickers
 */
function initColorPickers() {
    const colorPickers = document.querySelectorAll('.color-picker');
    if (colorPickers.length && typeof Pickr !== 'undefined') {
        colorPickers.forEach(picker => {
            const pickr = Pickr.create({
                el: picker,
                theme: 'classic',
                default: picker.getAttribute('data-default-color') || '#3E6BF7',
                components: {
                    preview: true,
                    opacity: true,
                    hue: true,
                    interaction: {
                        hex: true,
                        rgba: true,
                        hsla: false,
                        hsva: false,
                        cmyk: false,
                        input: true,
                        clear: false,
                        save: true
                    }
                }
            });
            
            const colorInput = document.getElementById(picker.getAttribute('data-input-id'));
            if (colorInput) {
                pickr.on('save', (color) => {
                    colorInput.value = color.toHEXA().toString();
                    pickr.hide();
                });
            }
        });
    }
}