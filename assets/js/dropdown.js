document.addEventListener('DOMContentLoaded', () => {
    const dropdownButtons = document.querySelectorAll('.menu-item-has-children');
    const dropdownContents = document.querySelectorAll('.sub-menu');

    dropdownButtons.forEach((dropdownButton, index) => {
        let timeoutId = null;
        const dropdownContent = dropdownContents[index];

        dropdownButton.addEventListener('mouseenter', () => {
            console.log('mouseenter detected on', dropdownButton);
            clearTimeout(timeoutId);
            dropdownContent.classList.add('show');
        });

        dropdownButton.addEventListener('mouseleave', () => {
            console.log('mouseleave detected on', dropdownButton);
            timeoutId = setTimeout(() => {
                dropdownContent.classList.remove('show');
            }, 1000);
        });
    });
});
