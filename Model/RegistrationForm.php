<?php


class RegistrationForm
{
    public $email;
    public $password;
    public $name;
    public $confim_password;
    public $created;

    /**
     * ContactForm constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->email = $request->post('email');
        $this->name = $request->post('name');
        $this->password = $request->post('password');
        $this->confim_password = $request->post('confim_password');
        $this->created = $request->post('created');
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $res = $this->email !== '' && $this->name !== '' && $this->password !== '' && $this->password == $this->confim_password;

        return $res;
    }


}