'use strict';

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

$(function() {
    if (window.Storage === 'undefined') {
        return;
    };

    var visitorAge = window.sessionStorage.getItem(EngagedNation.Constant.VERIFIED_AGE);
    var getReferrer = geturlparam('referrer');
    if (
        !isNaN(visitorAge)
        && visitorAge >= EngagedNation.Config.RegistrationAgeMinimum
    ) {
        window.location.href = '/' + ((typeof getReferrer !== 'undefined') ? '?referrer=' + getReferrer : '');
    }
});

