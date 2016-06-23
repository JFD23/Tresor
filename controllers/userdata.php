<?php

class UserdataController extends PluginController {

    public function set_keys_action()
    {
        if (Request::isPost()) {
            $userkey = new TresorUserKey(User::findCurrent()->id);
            $userkey['synchronously_encrypted_private_key'] = Request::get("private_key");
            $userkey['public_key'] = Request::get("public_key");
            $userkey->store();
        }
        $this->render_text(MessageBox::success(_("Schl�ssel erfolgreich erstellt. Vergessen Sie Ihr Passwort nicht!")));
    }
}