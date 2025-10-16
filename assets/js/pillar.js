document.addEventListener('DOMContentLoaded', function() {
    // Function to smoothly scroll to the target element
    function scrollToTarget(target) {
        var targetElement = document.querySelector(target);

        if (targetElement) {
            var offset = targetElement.offsetTop;

            // Perform smooth scroll
            window.scrollTo({
                top: offset,
                behavior: 'smooth'
            });
        }
    }

    // Add custom ID attributes to all H2 tags
    var postContent = document.querySelector('.scfb-post-content');
    var h2Elements = postContent.querySelectorAll('h2');
    h2Elements.forEach(function(element, index) {
        var customID = 'h2-' + index;
        element.setAttribute('id', customID);

        // Attach a click event handler to each H2 tag
        element.addEventListener('click', function() {
            // Scroll to the corresponding section
            scrollToTarget('#' + customID);
        });
    });

    // Attach click event handlers to elements with data-scroll attribute
    var scrollLinks = document.querySelectorAll('[data-scroll]');
    scrollLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            var target = link.getAttribute('href');

            // Scroll to the corresponding section
            scrollToTarget(target);
        });
    });
});