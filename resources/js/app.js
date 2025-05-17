import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('sidebar-toggle');
    const closeBtn = document.getElementById('sidebar-close');
    const sidebar = document.getElementById('logo-sidebar');

    if (toggleBtn && closeBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            toggleBtn.classList.add('hidden');
            closeBtn.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            toggleBtn.classList.remove('hidden');
            closeBtn.classList.add('hidden');
        });
    }
});

