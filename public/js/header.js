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
        window.location.href = 'index.php';

    }

});