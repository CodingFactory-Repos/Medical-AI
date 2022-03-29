document.addEventListener('DOMContentLoaded', function() {
    console.log('coucou');
});


document.addEventListener('mouseover', (e) => {
    if (e.target.classList.contains('imgLogo')) {
        e.target.style.cursor = 'pointer';
    }

});

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('imgLogo')) {
        // If we aren't on index or search page, redirect to index page
        if (window.location.pathname !== '/Medical-AI/index.php' && window.location.pathname !== '/Medical-AI/' && window.location.pathname !== '/Medical-AI/search') {
            window.location.href = '../index.php';
        } else {
            window.location.href = 'index.php';
        }
    }

});