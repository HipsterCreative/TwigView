<?php

App::uses('CakeEventListener', 'Event');
App::uses('ClassRegistry', 'Utilitty');

App::uses('CoreExtension', 'TwigView.Lib');
App::uses('Twig_Extension_I18n', 'TwigView.Lib');
App::uses('Twig_Extension_Ago', 'TwigView.Lib');
App::uses('Twig_Extension_Basic', 'TwigView.Lib');
App::uses('Twig_Extension_Number', 'TwigView.Lib');
App::uses('Twig_Extension_Utils', 'TwigView.Lib');
App::uses('Twig_Extension_Array', 'TwigView.Lib');
App::uses('Twig_Extension_String', 'TwigView.Lib');
App::uses('Twig_Extension_Inflector', 'TwigView.Lib');

class TwigRegisterTwigExtentionsListener implements CakeEventListener {

/**
 * {@inheritdoc}
 */
	public function implementedEvents() {
        return array(
            'Twig.TwigView.construct' => 'construct',
        );
    }

/**
 * @param CakeEvent $event
 */
	public function construct(CakeEvent $event) {
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_StringLoader);
        //$event->data['TwigEnvironment']->addExtension(new Twig_Extension_I18n); // @todo this should be fixed
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_Ago);
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_Basic);
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_Number);
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_Utils);
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_Array);
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_String);
        $event->data['TwigEnvironment']->addExtension(new Twig_Extension_Inflector);
    }
}