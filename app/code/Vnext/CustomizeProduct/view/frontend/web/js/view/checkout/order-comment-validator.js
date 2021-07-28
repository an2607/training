define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Vnext_CustomizeProduct/js/model/checkout/order-comment-validator'
    ],
    function (Component, additionalValidators, commentValidator) {
        'use strict';
        additionalValidators.registerValidator(commentValidator);
        return Component.extend({});
    }
);
