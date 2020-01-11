# CustomerStatus
Magento 2 Customer Status extension

# Description
This extension allows you and your customers change his status.
Status will be displayed in the top right corner.

Customer Status extesion works correctly with all the caches enabled.

# Installation
1. Clone or download the extension package.

2. Open the 'Magento-2-Customer-Status-extension-master' folder.

3. Copy the "Yakov" folder to the "app/code' folder in the root Magento folder.

4. Run the following commands from the root Magento folder:
- php bin/magento setup:upgrade
- php bin/magento cache:flush
- php bin/magento setup:static-content:deploy

# Usage
Front-end.
1. You should login to your customer account on front-end.
2. In your account click on "My Status" on the left side.
3. In the input field type your status and click "Save".
4. After page reloads you can see your status in the top right corner.
![Front](https://github.com/yakivV/Magento-2-Customer-Status-extension/blob/master/images/front.png)

Admin.
1. Navigate to "Customers > All Customers".
2. Click "Edit" on any customer.
3. Click on "Account Information" on the left side.
4. Scroll down and set any status in the "Customer Status".
![Admin](https://github.com/yakivV/Magento-2-Customer-Status-extension/blob/master/images/admin.png)
