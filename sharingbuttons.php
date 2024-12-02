<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * 
 * This is an Alternate Layout for a Custom HTML Module in Joomla 4
 * 
 * This code is inspired by https://sharingbuttons.io with the main advantage that there is
 * - no javaScript => lighter & faster
 * - no tracking => by definition it respects Privacy and it is ao GDPR compliant
 * If you wish more Sharing Buttons than Facebook, X (ex-Twitter), Linkedin, WhatsApp and Email implemented here, feel free to adapt the code below with any of the 7 others available buttons
 * 
 * https://sharingbuttons.io being *static*, you have to type manually the url and the text
 * The goal of the current code is to make those Sharing Buttons *dynamic*, namely with
 * - the current url
 * - and the current site name
 * We also add a 'title' to each link that you can customize
 * 
 * Procedure
 * - create an Alternate Layout
 *   - either manually by creating the following file /templates/YOUR_TEMPLATE/html/mod_custom/sharingbuttons.php
 *   - or via Joomla's interface
 * - copy the current code in the created file
 * - publish a Custom HTML Module in an existing position (for example main-bottom in the Template Cassiopeia)
 * - on the Tab 'Advanced'
 *   - select the current Layout (ie 'sharingbuttons')
 *   - select No Caching (otherwise you might have the sharing url of page X on page Y)
 * - clear your cache if necessary
 * - that's it!
 * 
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$uri = Uri::getInstance(); // https://docs.joomla.org/URLs_in_Joomla
$url = $uri->toString();
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$isharebtn = 'Utilisez les boutons ci-contre pour partager sur les réseaux sociaux ';
$ishare = 'Je partage via ';
$modId = 'mod-custom' . $module->id;

?>

<div id="<?php echo $modId; ?>" class="mod-custom custom">
    <?php // echo $module->content; // disabled because in this Alternate Layout we don't want to display the content of the Custom HTML Module of course 
    ?>

    <!-- Share icon -->
    <div title="<?php echo $isharebtn; ?>" class="resp-sharing-button resp-sharing-button--share resp-sharing-button--small">
        <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z" />
            </svg>
        </div>
    </div>

    <!-- LinkedIn -->
    <a title="<?php echo $ishare; ?>LinkedIn" class="resp-sharing-button__link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url; ?>&amp;title=<?php echo $sitename; ?>&amp;summary=<?php echo $sitename; ?>&amp;source=<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--linkedin resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z" />
                </svg>
            </div>
        </div>
    </a>

    <!-- Facebook -->
    <a title="<?php echo $ishare; ?>Facebook" class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" />
                </svg>
            </div>
        </div>
    </a>

    <!-- X -->
    <a title="<?php echo $ishare; ?>X" class="resp-sharing-button__link" href="https://x.com/intent/tweet/?text=<?php echo $sitename; ?>&amp;url=<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--x resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                </svg>
            </div>
        </div>
    </a>

    <!-- Mastodon https://mastodonshare.com/ -->
    <a title="<?php echo $ishare; ?>X" class="resp-sharing-button__link" href="https://mastodonshare.com/?text=<?php echo $sitename; ?>&amp;url=<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--mastodon resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <path d="m18.5,6.87c0-3.95-2.59-5.11-2.59-5.11-1.31-.6-3.55-.85-5.88-.87h-.06c-2.33.02-4.57.27-5.88.87,0,0-2.59,1.16-2.59,5.11,0,.91-.02,1.99.01,3.14.09,3.87.71,7.68,4.28,8.62,1.65.44,3.06.53,4.2.47,2.07-.11,3.23-.74,3.23-.74l-.07-1.5s-1.48.47-3.14.41c-1.64-.06-3.38-.18-3.64-2.2-.02-.18-.04-.37-.04-.57,0,0,1.61.39,3.66.49,1.25.06,2.42-.07,3.61-.22,2.28-.27,4.27-1.68,4.52-2.97.39-2.02.36-4.94.36-4.94Zm-3.05,5.09h-1.9v-4.65c0-.98-.41-1.48-1.24-1.48-.91,0-1.37.59-1.37,1.76v2.54h-1.89v-2.54c0-1.17-.46-1.76-1.37-1.76-.82,0-1.24.5-1.24,1.48v4.65h-1.9v-4.79c0-.98.25-1.76.75-2.33.52-.58,1.19-.87,2.03-.87.97,0,1.71.37,2.19,1.12l.47.79.47-.79c.49-.75,1.22-1.12,2.19-1.12.84,0,1.51.29,2.03.87.5.58.75,1.35.75,2.33v4.79Z"></path>
            </svg>
            </div>
        </div>
    </a>

    <!-- Bluesky https://docs.bsky.app/docs/advanced-guides/intent-links -->
    <a title="<?php echo $ishare; ?>Bluesky" class="resp-sharing-button__link" href="https://bsky.app/intent/compose?text=<?php echo $sitename; ?>%0A<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--bluesky resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <path d="M9.993,9.149c-.772-1.495-2.865-4.288-4.813-5.662-1.866-1.317-2.58-1.09-3.043-.878-.54.246-.637,1.075-.637,1.563s.265,4.003.444,4.587c.579,1.939,2.628,2.595,4.519,2.382.096-.014.193-.029.294-.039-.096.014-.198.029-.294.039-2.768.41-5.233,1.418-2.001,5.011,3.55,3.675,4.866-.786,5.541-3.053.675,2.262,1.452,6.564,5.474,3.053,3.024-3.053.83-4.601-1.939-5.011-.096-.01-.198-.024-.294-.039.101.014.198.024.294.039,1.89.212,3.945-.444,4.519-2.382.174-.588.444-4.099.444-4.587s-.096-1.317-.637-1.563c-.468-.212-1.177-.439-3.043.878-1.963,1.379-4.056,4.167-4.827,5.662h0Z"></path>
                </svg>
            </div>
        </div>
    </a>

    <!-- WhatsApp -->
    <a title="<?php echo $ishare; ?>WhatsApp" class="resp-sharing-button__link" href="whatsapp://send?text=<?php echo $sitename; ?>%20<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z" />
                </svg>
            </div>
        </div>
    </a>

    <!-- E-Mail -->
    <a title="<?php echo $ishare; ?>e-mail" class="resp-sharing-button__link" href="mailto:?subject=<?php echo $sitename; ?>&amp;body=<?php echo $url; ?>" target="_self" rel="noopener" aria-label="">
        <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small">
            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z" />
                </svg>
            </div>
        </div>
    </a>

</div>

<?php
$sharingButtonsCss = <<<MYCSS

/* set a fixed position only for this module */
/* on mobile icons are "horizontal and bottom-left" but on larger screen we want them to be "vertical and middle-left" */
#$modId {
  position: fixed;
  bottom: 0;
  left: 0;
  display: flex;
  flex-direction: row;
  z-index: 999; /* just to make sure that it stays on top of the rest, like full-with slideshows or whatever */
}
@media (min-width: 960px) {
  #$modId {
    bottom: calc(50vh - 129px); /* the icons height is here 258px, therefore the 258px / 2 = 129px to center it vertically */
    flex-direction: column;
  }
}

/* hereafter all the styling of the buttons */

.resp-sharing-button__link,
.resp-sharing-button__icon {
  display: inline-block;
}

.resp-sharing-button__link {
  text-decoration: none;
  color: #fff;
  margin: 0; /* instead of 0.5em; */
}

.resp-sharing-button {
  border-radius: 0px; /* instead of 5px; */
  transition: .5s ease-out; /* instead of 25ms ease-out;*/
  padding: 0.2em 0.45em; /* instead of 0.5em 0.75em; */
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
}

.resp-sharing-button__icon svg {
  width: 1em;
  height: 1em;
  margin-right: 0.4em;
  vertical-align: top;
}

.resp-sharing-button--small svg {
  margin: 0;
  vertical-align: middle;
}

/* Non solid icons get a stroke */
.resp-sharing-button__icon {
  stroke: #fff;
  fill: none;
}

/* Solid icons get a fill */
.resp-sharing-button__icon--solid,
.resp-sharing-button__icon--solidcircle {
  fill: #fff;
  stroke: none;
}

.resp-sharing-button--share {
  background-color: white;
  color: black;
}
.resp-sharing-button--share svg {
  fill: black;
}

/* my own customization from here, overriding some of the values above. Feel free to clean according to your needs */

.resp-sharing-button--facebook {
  background-color: #3b5998;
  border-color: #3b5998;
}

.resp-sharing-button--facebook:hover,
.resp-sharing-button--facebook:active {
  background-color: #2d4373;
  border-color: #2d4373;
}

.resp-sharing-button--x {
    background-color: #080808;
    border-color: #080808;
  }
  
.resp-sharing-button--x:hover,
.resp-sharing-button--x:active {
    background-color: #303030;
    border-color: #303030;
}

.resp-sharing-button--bluesky {
  background-color: #0085ff;
  border-color: #0085ff;
}

.resp-sharing-button--bluesky:hover,
.resp-sharing-button--bluesky:active {
  background-color: #208bfe;
  border-color: #208bfe;
}

.resp-sharing-button--mastodon {
  background-color: #6364ff;
  border-color: #6364ff;
}

.resp-sharing-button--mastodon:hover,
.resp-sharing-button--mastodon:active {
  background-color: #563acc;
  border-color: #563acc;
}

.resp-sharing-button--email {
  background-color: #777777;
  border-color: #777777;
}

.resp-sharing-button--email:hover,
.resp-sharing-button--email:active {
  background-color: #5e5e5e;
  border-color: #5e5e5e;
}

.resp-sharing-button--linkedin {
  background-color: #0077b5;
  border-color: #0077b5;
}

.resp-sharing-button--linkedin:hover,
.resp-sharing-button--linkedin:active {
  background-color: #046293;
  border-color: #046293;
}

.resp-sharing-button--whatsapp {
  background-color: #25D366;
  border-color: #25D366;
}

.resp-sharing-button--whatsapp:hover,
.resp-sharing-button--whatsapp:active {
  background-color: #1DA851;
  border-color: #1DA851;
}
MYCSS;

$doc = Factory::getDocument();
$doc->addStyleDeclaration($sharingButtonsCss);

?>
