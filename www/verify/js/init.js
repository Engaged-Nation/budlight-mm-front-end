'use strict';

$(function() {
    if (window.Storage === 'undefined') {
        return;
    };

    var visitorAge = window.sessionStorage.getItem(EngagedNation.Constant.VERIFIED_AGE);

    if (
        !isNaN(visitorAge)
        && visitorAge >= EngagedNation.Config.RegistrationAgeMinimum
    ) {
        window.location.href = '/';
    }
});
