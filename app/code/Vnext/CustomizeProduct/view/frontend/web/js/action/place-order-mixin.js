define([
    'jquery',
    'mage/utils/wrapper'
], function ($, wrapper) {
    'use strict';
    return function (placeOrderAction) {
        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            if (paymentData['extension_attributes'] === undefined) {
                paymentData['extension_attributes'] = {};
            }
            var customerInput = $('.order-comment');
            paymentData['extension_attributes']['customer_note'] = customerInput.val();
            return originalAction(paymentData, messageContainer);
        });
    };
});
