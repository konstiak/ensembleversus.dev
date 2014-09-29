<?php

return array(

  'username'                  => 'Uživatelské jméno',
  'password'                  => 'Heslo',
  'password_confirmation'     => 'Potvrdit heslo',
  'e_mail'                    => 'Email',
  'username_e_mail'           => 'Uživatelské jméno nebo Email',

  'signup'  => array(
    'title'                   => 'Registrovat',
    'desc'                    => 'Vytvořit nový účet',
    'confirmation_required'   => 'Vyžaduje se aktivace účtu emailem',
    'submit'                  => 'Registrovat',
  ),

  'login'   => array(
    'title'                   => 'Přihlásit se',
    'desc'                    => 'Zadajte své přihlašovací údaje',
    'forgot_password'         => '(zapoměl jsem heslo)',
    'remember'                => 'Zapamatovat přihlášení',
    'submit'                  => 'Přihlásit',
  ),

  'forgot'  => array(
    'title'                   => 'Zapomenuté heslo',
    'submit'                  => 'Pokračovat',
  ),

  'alerts'  => array(
    'account_created'         => 'Váš účet byl úspěšně vytvořený.',
    'instructions_sent'       => 'Na email vám byli zaslány instrukce na aktivaci účtu.',
    'too_many_attempts'       => 'Překročili jste limit pokusů o registraci. Zkuste to opět o několik minut.',
    'wrong_credentials'       => 'Nesprávné uživatelské jméno, email nebo heslo.',
    'not_confirmed'           => 'Váš účet není aktivovaný. Instrukce na aktivaci vám byli zaslané na email.',
    'confirmation'            => 'Váš účet byl aktivovaný. Teraz se můžete přihlásit.',
    'wrong_confirmation'      => 'Nesprávný aktivační kód.',
    'password_forgot'         => 'Instrukce pro obnovení hesla byli odeslané na váš email.',
    'wrong_password_forgot'   => 'Uživatel nebyl nalezen.',
    'password_reset'          => 'Vaše heslo bylo úspěšně změneny.',
    'wrong_password_reset'    => 'Nesprávne heslo.',
    'wrong_token'             => 'Token potřebný pro obnovení hesla není správný.',
    'duplicated_credentials'  => 'Poskytnuté údaje se již používají. Zkuste to opět s jinými údaji.',
  ),

  'email'   => array(
    'account_confirmation'  => array(
      'subject'               => 'Aktivace účtu',
      'greetings'             => 'Dobrý den :name,',
      'body'                  => 'Pro aktivaci účtu, klikněte na následující odkaz.',
      'farewell'              => 'Přejeme hezký den',
    ),

    'password_reset'        => array(
      'subject'               => 'Obnovení hesla',
      'greetings'             => 'Dobrý den :name,',
      'body'                  => 'Pro obnovení hesla, klikněte na následující odkaz.',
      'farewell'              => 'Přejeme hezký den',
    ),
  ),

);
