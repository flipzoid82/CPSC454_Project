# CPSC 454 - Class Project: MyCloud Secure

## This project was developed by:
- Hector Rodriguez: 
> Mobile Integration, AWS Administrator/Implementation
- Kayla Nguyen: 
> TLS/HTTPS Implementation, Backend 
- Joesh Bautista: 
> Frontend Design, Backend and AWS Implementation

## Technologies used:
- AWS: IAM, Elastic Beanstalk, S3, RDS
- HTML, CSS and Bootstrap 4
- PHP
- MySQL

### MyCloud Secure is live: https://www.mycloudsecure.me

---
### **The following demonstrates the functionalities of the webApp:**

1. **Login/register:**
    - If you already have an account, simply sign in. 
    ![](./img/md-img/log-in.png)
    - If not, then you can register and then login afterwards.
    ![](./img/md-img/register.png)

2. **After a successful login, you will see this screen:**
    ![](./img/md-img/main.png)
    > From here, you can see your files and perform various things to them. Logout by clicking the 'Logout' button on the far right of the navbar.

    When you click a file, a modal will popup with options you can do with that file:

    ![](./img/md-img/modal.png)
    >From here you can:
    - Download the file
    - Share the file
    - Move the file to trash
    - Or close the modal

3. **Sharing:**
    - When the share button is clicked, an input box will appear below the modal.
    ![](./img/md-img/share.png)
    >Enter the username and press 'Share' to share the file.

    - To check your shared files, click the side-menu: 'Shared with Me'
    - This will take you to the 'Share with me' page:
    ![](./img/md-img/sharePage.png)
    - When you click a file you will see which user you're sharing the file with: 
    ![](./img/md-img/share2.png)
    >You can also download and delete the file from here.

4. **Deleting:**
    - When you move the file to trash, you can check you can see then in the 'Trash' page:
    ![](./img/md-img/trash.png)
    >From here, when you click a file, you can either restore the file or permanently delete it.
    ![](./img/md-img/permDel.png)
    >You can also _empty trash_ by clicking the button on the top right. This permanently deletes all files in the trash.

5. **Recent:**
    ![](./img/md-img/recent.png)
    >This page sorts the files in the main cloud from newest to oldest.

---

### **The src code for the mobile version of the app is located here:**
- https://github.com/hectorRod101/MyCloudSecure

### **Our video presentation can be found here:**
- https://youtu.be/53WhmsXi_i0






