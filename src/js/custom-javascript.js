// Add your custom JS here.
(function ($) {
    // Use the $ in peace...
    $(document).ready(function () {
        //For validate the bootstrap forms
        $('.popup-form-btn').on("click", function () {
            console.log("Click en .popup-form-btn");
            let forms = $('.needs-validation');
            let con = true;

            Array.from(forms).forEach(form => {
                console.log(form);
                if (!form.checkValidity()) {
                    con = false;
                }
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            });

            if (con) {
                $('.card-title').remove();
                $('form').remove();
                $('.pop-form-body').append('<h1 class="card-title h-1 text-white text-center text-uppercase">Thank you! Your message has been sent!</h1>');
            }

        });
    });

}(jQuery));