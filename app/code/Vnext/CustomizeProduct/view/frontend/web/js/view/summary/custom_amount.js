define(
    [
        'jquery',
        'Magento_Checkout/js/view/summary/abstract-total'
    ],
    function ($,Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Vnext_CustomizeProduct/summary/custom_amount'
            },
            isDisplayedCustomdiscount : function(){
                return true;
            },
            getCustomDiscount : function(){
                return '-₫10';
            }
        });
    }
);
