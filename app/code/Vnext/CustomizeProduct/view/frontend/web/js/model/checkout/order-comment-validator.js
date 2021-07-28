define(
    [
        'mage/translate',
        'Magento_Ui/js/model/messageList'
    ],
    function ($t, messageList) {
        'use strict';
        return {
            validate: function () {
                const isValid = false;

                if (!isValid) {
                    messageList.addErrorMessage({ message: $t('a possible failure message ...  ') });
                }

                return true;
            }
        }
    }
);
