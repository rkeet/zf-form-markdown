(function () {
    const inputs = document.querySelectorAll('[data-markdown-input]'),
        converter = new showdown.Converter(showdownOptions);

    inputs.forEach(function (element) {
        element.addEventListener('change', function (event) {
            let text = event.target.value,
                target = document.querySelector('[data-for="' + event.target.name + '"]');

            target.innerHTML = converter.makeHtml(text);
        });
    });
})();
