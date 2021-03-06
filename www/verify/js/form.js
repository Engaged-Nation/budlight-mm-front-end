'use strict';

$(function() {
    function geturlparam(param) {
        var url = decodeURIComponent(window.location.search.substring(1)),
            urlvar = url.split('&'),
            pname,
            i;

        for (i = 0; i < urlvar.length; i++) {
            pname = urlvar[i].split('=');

            if (pname[0] === param) {
                return pname[1] === undefined ? true : pname[1];
            }
        }
    };

    $('#verify-age-form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);

        /**
         * Allows custom style for bootstrap form validation.
         * https://getbootstrap.com/docs/4.4/components/forms/#custom-styles
         */
        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            return;
        }

        var formData = serializeJson(form.serializeArray());
        var visitorAge = calculateAge(
            formData.dob_year
            + '-' + formData.dob_month
            + '-' + formData.dob_day
        );

        if (
            visitorAge < EngagedNation.Config.RegistrationAgeMinimum ||
            formData.dob_month == '' ||
            formData.dob_day == '' ||

            formData.dob_year == ''
        ) {
            this.remove();
            $('#verify-age-failed').removeClass('d-none');
            return;
        }

        if (window.Storage !== 'undefined') {
            window.sessionStorage.setItem(EngagedNation.Constant.VERIFIED_AGE, visitorAge);
            window.sessionStorage.setItem('enVerifiedDob', formData.dob_year + '-' + formData.dob_month + '-' + formData.dob_day);
        };

        var invite = geturlparam('invite'),
            redirectTo = '/';

        if (invite) {
            redirectTo += '?invite=' + invite;
        }

        window.location.href = redirectTo;

        /**
         * @param {string} YYYY-MM-DD
         * @return {int}
         */
        function calculateAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var month = today.getMonth() - birthDate.getMonth();

            if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        }

        /**
         * @param {array} $.serializeArray()
         * @return {object}
         */
        function serializeJson(serializeArray) {
            var data = {};

            $.map(
                serializeArray,
                function(property) {
                    var value = property['value'].trim();

                    if (value.length == 0) return true;

                    data[property['name']] = value;
                }
            );

            return data;
        }
    });
});
