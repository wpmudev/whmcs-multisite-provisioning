=== WHMCS MultiSite Provisioning ===
Contributors: Arnold Bailey
Tags: WHMCS, hosting, multisite, support, billing, integration, provisioning
Requires at least: 3.0 and Multisite
Tested up to: 3.3.1
Stable tag: 1.0

This plugin allows provisioning of blogs on a Wordpress multi-site installation from external WHMCS packages and billing system.
Includes provisioning for Subdomain, Subdirectory or Domain Mapping Wordpress Multisite installs.

== Description ==

This plugin allows provisioning of blogs on a Wordpress multi-site installation from external WHMCS packages and billing system.
Includes provisioning for Subdomain, Subdirectory or Domain Mapping Wordpress Multisite installs.

The plugin's /whmcs directory contains modules to be installed on WHMCS to communicate with this plugin.

The current version Is from WHMCS to Wordpress only. Some fields will sync to WHMCS automatically such as username, domain, path. Changes to these are locked out at WHMCS admin. 
Passwords may be chaged from WHMCS Admin but they DO NOT feed back from Wordpress to WHMCS. Wordpress passwords are hashed and can't be read in clear.

== Installation of Wordpress Plugin ==

1. Upload the 'whmcs-multisite-provisioning' folder to the '/wp-content/plugins/' directory
2. Network activate the plugin on the Network Admin of your multi-site Wordpress installation through the Network Admin's 'Plugins' menu in WordPress.
3. On the settings page currently nothing is required to be set.
4. If you set allowed IP addresses they must contain the IP of your WHMCS server. Blank turns off IP filtering.
5. Other fields are non-functional to be added in the future.
6. That's all the config necessary.

== Installation of WHMCS Modules ==

Copy the whmcs/Modules directory over your Modules directory in your WHMCS installation.
This adds a Server Module named "whmcs_multisite" and an Addon module named "whmcs_multisite".

IMPORTANT: Create an Administrator in WHMCS who will authorize Multisite products. This is necessary to authorize Wordpress to update your 
service information after a site is created. If not filled in the Product creation will fail. 
The only important part is that the username has administartor level permission to create the product.

== WHMCS Server Module configuration ==
1. In WHMCS admin go to Setup | Servers and Add New Server
2. Give the Server a name meaningful to you.
3. Enter the Hostname = primary domain of the Wordpress install you want to control (mydomain.tld)
4. Enter Monthly cost
5. Set the Type to whmcs_multisite
6. Set the Username to a Super Admin username on your Wordpress site.
7. Set the Password to the Super Admin password. 
8. Save.
9. In Servers Create New Group and add this server to it.

== WHMCS Addon Module configuration ==
1. In WHMCS admin go to Setup | Addon Modules
2. Activate the WHMCS Multisite Module
3. Set Access Control as appropriate for your administrators.

== If your Wordpress Install is Subdomain or Subdirectory ONLY, no Domain Mapping ==
Create a Product
1. Create a Product Group to Hold the new products
2. In WHMCS admin go to Setup | Product/Services and Add New Product
3. Create a Product and Set the Product Type to Hosting Account.
4. Set the product Group to the one created above.
5. Give the Product a meaningful name
6. On the Details tab UNTICK Require domain. Other fields as you prefer
7. On the Modules Settings Tab Select whmcs_multisite as the Module name
8. Select the Server Group defined above.
9. Set a default blog title. This can be edited by the user in Wordpress after blog is created ("My New Blog").
10. Set a default Blog Domain. If you're not using Custom fields(see below) this is the default domain name that will be used with numbers appended.
11. Set the default role of the User that may be created for this product. Usually "administrator".
12. Set the Web Space Quota or leave blank for Wordpress default value.
13. Tick the two custom field names if you are using custom fields to define the Title and Domain.
14. Set the Radio buttons for when the product setup will occur.
15. On the Custom fields Tab, create two custom fields.
16. First custom field must be named "Domain", as a Textbox Validation "|^([a-zA-Z0-9-])+$|i" (without quotes), Required field, Show on Order Form.
17. Second custom field must be named "Title", as a Textbox Validation "|^([a-zA-Z0-9- ])+$|i" (without quotes), Required field, Show on Order Form.
18. Rest of the Product fields are Admin's choice.

== If your Wordpress Install Offers Domain Mapping as well as subdomain/subdirectroy installs ==
Create a Product =
1. Create a Product Group to Hold the new products
2. In WHMCS admin go to Setup | Product/Services and Add New Product
3. Create a Product and Set the Product Type to Hosting Account.
4. Set the Product Group to the one created above.
5. Give the Product a meaningful name
6. On the Details Tab TICK Require domain. Other fields as you prefer
7. On the Modules Settings Tab Select whmcs_multisite as the Module name
8. Select the Server Group defined above.
9. Set a default blog title. This can be edited by the user in Wordpress after blog is created ("My New Blog").
10. Set a default Blog Domain. If you're not using Custom fields(see below) this is the default domain name that will be used with numbers appended.
11. UNTICK the two custom field names.
12. Set the default role of the User that may be created for this product. Usually "administrator".
13. Set the Web Space Quota or leave blank for Wordpress default value.
14. Set the Radio buttons for when the product setup will occur.
15. Do not create custom fields.
16. If you want to offer subdomain/subdirectory installs as well as Domain Mapping =
17. On the Other Tab fill in the Subdomains Option with your sites primary domain ('.mysite.com") Note the leading dot.
18. Rest of the Product fields are Admin's choice.

== Known Issues ==
1. If a user does not already exist on Wordpress as determined by matching the WHMCS Clients email 
with the Wordpress users email, a new user will be created using the WHMCS Client's email address and 
the portion before the '@' as the users name. If you are Accepting Orders in Admin before creation you 
can change the default username there. Once the username is created it cannot be changed. 

2. If the WHMCS clients email address already exists as a user in Wordpress the Wordpress user account 
will override what you may put in WHMCS. Wordpress user names can not be changed and this is enforced in WHMCS.

3. WHMCS generates random passwords when creating a service. If a new Wordpress user is 
created as a result this random password is the password for the new user. If the user already exists 
in Wordpress WHMCS still generates a random password but it does NOT change the Wordpress password. 
WHMCS can change the password on Wordpress but Wordpress password changes will not be feed back to WHMCS.

4. Each WHMCS service creates different random passwords so they will not match if a Client has more than one 
service at the same Wordpress site.

== Change log ==

See separate changelog.txt

