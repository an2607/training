define(
    [
        'jquery', 'uiComponent'
    ],
    function ($, Component) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Vnext_CustomizeProduct/checkout/order-comment-block'
            }
        });
    }
);
