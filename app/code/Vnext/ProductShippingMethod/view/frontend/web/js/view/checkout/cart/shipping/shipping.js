define(
    [
        'Magento_Checkout/js/view/summary/abstract-total',
        'Magento_Checkout/js/model/quote',
        'Magento_Catalog/js/price-utils',
        'Magento_Checkout/js/model/totals'
    ],
    function (Component, quote, priceUtils, totals) {
        "use strict";
        return Component.extend({
            defaults: {
                isFullTaxSummaryDisplayed: window.checkoutConfig.isFullTaxSummaryDisplayed || false,
                template: 'Vnext_ProductShippingMethod/checkout/cart/shipping/shipping'
            },
            totals: quote.getTotals(),
            isTaxDisplayedInGrandTotal: window.checkoutConfig.includeTaxInGrandTotal || false,
            isDisplayed: function() {
                return this.isFullMode();
            },
            getValue: function() {
                let ship =[] ;
                let shippingMethod =[];


                if (this.totals()) {

                    ship = totals.getSegment('shipping_method').value;
                    for(let item of ship){
                        shippingMethod.push(JSON.parse(item).value)
                    }

                    shippingMethod = shippingMethod.reduce(function(a,b) {
                        if (a.indexOf(b) < 0 ) {
                            a.push(b);
                        }
                        return a;
                    },[]);

                }
                return shippingMethod;
            },
        });
    }
);
