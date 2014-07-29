# Phalcon User Plugin 2 by Mighty-Code NOT WORKING yet

* [About](#about)
* [TODO](#todo)
* [Features](#features)
* [Installation](#installation)
* [Plug it](#plug-it)
* [Configuration](#configuration)
* [Example controller](#example-controller)
* [Known issues](#known-issues)
* [Examples](#examples)

### <a id="about"></a>About

It is a plugin based on Vokuro ACL idea. This is an alpha version and i do not recommend you to use it in 
a production environment.

### <a id="todo"></a>TODO
- correct password reset function
- Test everything
- Implement CRUD templates for ACl, UserManagement, etc

### <a id="features"></a>Features

- Login / Register with Facebook account
- Login / Register with LinkedIn account
- Login / Register with Twitter account
- Login / Register with Google account
- Change password
- Password recovery by email
- Protect different areas from your website, where a user must be loged in, in order to have access
- Protect different actions, based on the ACL list for each user
- User profile: birth date, birth location, current location, profile picture

### <a id="installation"></a>Installation

The recommended installation is via compososer. Just add the following line to your composer.json:

```json
{
    "mighty-code/phalcon-user-plugin-2": "dev-master"
}
```

```bash
$ php composer.phar update
```

### <a id="plug-it"></a>Plug it

* Not aviable yet!

### <a id="configuration"></a>Configuration

You must add configuration keys to your config.php file. If you are using a multimodule application, i recommend 
you to set up the configuration separately for each module.

#### Configuration examples

* Released when plugin is running correctly

### <a id="example-controller"></a>Example controller

* For a complete controller example read the Wiki page: https://github.com/calinrada/PhalconUserPlugin/wiki/Controller

```php
class UserController extends Controller
{
    /**
     * Login user
     * @return \Phalcon\Http\ResponseInterface
     */
    public function loginAction()
    {
        if(true === $this->auth->isUserSignedIn())
        {
            $this->response->redirect(array('action' => 'profile'));
        }

        $form = new LoginForm();

        try {
            $this->auth->login($form);
        } catch (AuthException $e) {
            $this->flash->error($e->getMessage());
        }

        $this->view->form = $form;
    }

    /**
     * Login with Facebook account
     */
    public function loginWithFacebookAction()
    {
        try {
            $this->view->disable();
            return $this->auth->loginWithFacebook();
        } catch(AuthException $e) {
            $this->flash->error('There was an error connectiong to Facebook.');
        }
    }
    
    /**
     * Login with LinkedIn account
     */
    public function loginWithLinkedInAction()
    {
        try {
            $this->view->disable();
            $this->auth->loginWithLinkedIn();
        } catch(AuthException $e) {
            $this->flash->error('There was an error connectiong to LinkedIn.');
        }
    }   
    
    /**
     * Login with Twitter account
     */
    public function loginWithTwitterAction()
    {
        try {
            $this->view->disable();
            $this->auth->loginWithTwitter();
        } catch(AuthException $e) {
            $this->flash->error('There was an error connectiong to Twitter.');
        }
    } 
    
    /**
     * Login with Google account
     */
    public function loginWithGoogleAction()
    {
        try {
            $this->view->disable();
            $this->auth->loginWithGoogle();
        } catch(AuthException $e) {
            $this->flash->error('There was an error connectiong to Google.');
        }
    }    

    /**
     * Logout user and clear the data from session
     *
     * @return \Phalcon\Http\ResponseInterface
     */
    public function signoutAction()
    {
        $this->auth->remove();
        return $this->response->redirect('/', true);
    }
```

### <a id="known-issues"></a>Known issues
- Twitter does not provide us the email. We are generating a random email for the user. It is your choice how you handle this

### <a id="examples"></a>Examples





