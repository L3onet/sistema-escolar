import './bootstrap';

// ================================================
// Toggle Sidebar (Mobile)
// ================================================
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
}

// ================================================
// Close sidebar when clicking outside (Mobile)
// ================================================
document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.querySelector('.sidebar-toggle');

    if (window.innerWidth <= 992) {
        if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    }
});

// ================================================
// Confirmación de eliminación con SweetAlert2
// ================================================
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Está seguro?',
                text: "Esta acción no se puede revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
