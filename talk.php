<?php
// Talk extension, https://github.com/GiovanniSalmeri/yellow-talk

class YellowTalk {
    const VERSION = "1.0.0";
    public $yellow;         // access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("talkLocation", "/media/talk/");
        $this->yellow->system->setDefault("talkTokenLocation", "/media/talk/token/");
        $this->yellow->system->setDefault("talkPendingLocation", "/media/talk/pending/");
        $this->yellow->system->setDefault("talkFeedImageLocation", "/media/talk/images/");
        $this->yellow->system->setDefault("talkFile", "messages.json");
        $this->yellow->system->setDefault("talkGroupFile", "groups.psv");
        $this->yellow->system->setDefault("talkAuthorFile", "authors.psv");
        $this->yellow->system->setDefault("talkForbiddenFile", "forbidden.psv");
        $this->yellow->system->setDefault("talkNewUsernamePrefix", "u");
        $this->yellow->system->setDefault("talkPasswordLength", "12");
        $this->yellow->system->setDefault("talkWhitelist", "");
        $this->yellow->system->setDefault("talkBlacklist", "");
        $this->yellow->system->setDefault("talkBlacklistPath", "");
        $this->yellow->system->setDefault("talkListStyle", "nested"); // flat, expandable
        $this->yellow->system->setDefault("talkShowAvatar", "1");
        $this->yellow->system->setDefault("talkTokenLifetime", "120");
        $this->yellow->system->setDefault("talkPendingLifetime", "60");
        $this->yellow->system->setDefault("talkClientSideValidation", "0");
        $this->yellow->system->setDefault("talkLatestQuestionsNumber", "10");
        $this->yellow->system->setDefault("talkTextMaxLength", "5000");
        $this->yellow->system->setDefault("talkFeedName", "talk.xml");
        $this->yellow->system->setDefault("talkFeedDays", "10");
        $this->yellow->language->setDefaults(array(
            "Language: en",
            "TalkIndex: Index",
            "TalkStats: Group @group · Updated @time · Answers @answercount",
            "TalkHeading: Group @group · @description · Moderator @moderator",
            "TalkNewQuestion: New Question",
            "TalkNewAnswer: New Answer",
            "TalkLatestQuestions: Latest Questions",
            "TalkAuthor: Name",
            "TalkEmail: Email",
            "TalkSubject: Subject",
            "TalkText: Text",
            "TalkPublish: Publish",
            "TalkMessageSent: You have published your message. Thank you!",
            "TalkEdit: Edit",
            "TalkSignupLegend: Subscribe",
            "TalkSignoffLegend: Unsubscribe",
            "TalkSignup: Sign Up",
            "TalkSignoff: Sign Off",
            "TalkUsername: Username",
            "TalkPassword: Password",
            "TalkSubscriptionInfo: Please use your full name. To upload a photo of yourself, use [Libravatar](https://libravatar.org/) or [Gravatar](https://gravatar.com/). This form can also be used to retrieve your password if you have forgotten it.",
            "TalkSubscriptionMessage: You are signed up! Check your email inbox.",
            "TalkUnsubscriptionMessage: You are signed off.",
            "TalkFeed: RSS feed",
            "TalkNotAllowed: Missing or bad credentials: you are not allowed to complete this operation.",
            "TalkMailSubject: You are signed up",
            "TalkMailMessage: Hello @name.\\n\\nHere are your credentials:\\nUsername: @username\\nPassword: @password",
            "TalkMailMessageFirst: Log in to @url within @expiry minutes. If you didn’t request this subscription, please ignore this message.",
            "CoreError422Title: Unprocessable Content",
            "CoreError422Text: A required field is missing or invalid. Please go back and complete or correct the form.",
            "Language: de",
            "TalkIndex: Index",
            "TalkStats: Gruppe @group · Aktualisiert @time · Antworten @answercount",
            "TalkHeading: Gruppe @group · @description · Moderator @moderator",
            "TalkNewQuestion: Neue Frage",
            "TalkNewAnswer: Neue Antwort",
            "TalkLatestQuestions: Neueste Fragen",
            "TalkAuthor: Name",
            "TalkEmail: Email",
            "TalkSubject: Betreff",
            "TalkText: Text",
            "TalkPublish: Veröffentlichen",
            "TalkMessageSent: Nachricht wurde veröffentlicht. Vielen Dank!",
            "TalkEdit: Bearbeiten",
            "TalkSignupLegend: Anmeldung",
            "TalkSignoffLegend: Abmeldung",
            "TalkSignup: Anmelden",
            "TalkSignoff: Abmelden",
            "TalkUsername: Benutzername",
            "TalkPassword: Kennwort",
            "TalkSubscriptionInfo: Bitte gib deinen vollständigen Namen an. Um ein Foto von dir hochzuladen, verwende [Libravatar](https://libravatar.org/) oder [Gravatar](https://gravatar.com/). Über dieses Formular kannst du auch dein Kennwort zurücksetzen, falls du es vergessen hast.",
            "TalkSubscriptionMessage: Du bist angemeldet! Bitte überprüfe deinen E-Mail-Posteingang.",
            "TalkUnsubscriptionMessage: Du bist abgemeldet.",
            "TalkFeed: RSS-Feed",
            "TalkNotAllowed: Fehlende oder ungültige Anmeldedaten: du bist nicht berechtigt, diesen Vorgang abzuschließen.",
            "TalkMailSubject: Du bist angemeldet",
            "TalkMailMessage: Hallo @name.\\n\\nHier sind deine Anmeldedaten:\\nBenutzername: @username\\nKennwort: @password",
            "TalkMailMessageFirst: Melde dich innerhalb von @expiry Minuten unter @url an. Wenn du dich nicht selbst angemeldet hast, ignoriere diese Nachricht bitte.",
            "CoreError422Title: Nicht verarbeitbar Inhalt",
            "CoreError422Text: Ein Pflichtfeld fehlt oder ist ungültig. Bitte gehe zurück und vervollständige oder korrigiere das Formular.",
            "Language: sv",
            "TalkIndex: Index",
            "TalkStats: Grupp @group · Uppdaterad @time · Svar @answercount",
            "TalkHeading: Grupp @group · @description · Moderator @moderator",
            "TalkNewQuestion: Ny fråga",
            "TalkNewAnswer: Nytt svar",
            "TalkLatestQuestions: Senaste frågorna",
            "TalkAuthor: Namn",
            "TalkEmail: E-post",
            "TalkSubject: Ämne",
            "TalkText: Text",
            "TalkPublish: Publicera",
            "TalkMessageSent: Du har publicerat ditt meddelande. Tack!",
            "TalkEdit: Redigera",
            "TalkSignupLegend: Registrering",
            "TalkSignoffLegend: Avregistrering",
            "TalkSignup: Registrera dig",
            "TalkSignoff: Avregistrera dig",
            "TalkUsername: Användarnamn",
            "TalkPassword: Lösenord",
            "TalkSubscriptionInfo: Ange ditt fullständiga namn. För att ladda upp ett foto av dig själv kan du använda [Libravatar](https://libravatar.org/) eller [Gravatar](https://gravatar.com/). Du kan också använda detta formulär för att återställa ditt lösenord om du har glömt det.",
            "TalkSubscriptionMessage: Du är registrerad! Kolla din e-postinkorg.",
            "TalkUnsubscriptionMessage: Du är utloggad.",
            "TalkFeed: RSS-flöde",
            "TalkNotAllowed: Avsaknande eller felaktiga inloggningsuppgifter: du har inte behörighet att utföra denna åtgärd.",
            "TalkMailSubject: Du är registrerad",
            "TalkMailMessage: Hej @name.\\n\\nHär är dina inloggningsuppgifter:\\nAnvändarnamn: @username\\nLösenord: @password",
            "TalkMailMessageFirst: Logga in på @url inom @expiry minuter. Om du inte har begärt denna registrering, kan du bortse från detta meddelande.",
            "CoreError422Title: Innehåll som inte kan bearbetas",
            "CoreError422Text: Ett obligatoriskt fält saknas eller är ogiltigt. Gå tillbaka och fyll i eller korrigera formuläret.",
            "Language: it",
            "TalkIndex: Indice",
            "TalkStats: Gruppo @group · Aggiornato @time · Risposte @answercount",
            "TalkHeading: Gruppo @group · @description · Moderatore @moderator",
            "TalkNewQuestion: Nuova domanda",
            "TalkNewAnswer: Nuova risposta",
            "TalkLatestQuestions: Ultime domande",
            "TalkAuthor: Nome",
            "TalkEmail: Email",
            "TalkSubject: Oggetto",
            "TalkText: Testo",
            "TalkPublish: Pubblica",
            "TalkMessageSent: Il tuo messaggio è stato pubblicato. Grazie!",
            "TalkEdit: Modifica",
            "TalkSignupLegend: Iscrizione",
            "TalkSignoffLegend: Disiscrizione",
            "TalkSignup: Iscriviti",
            "TalkSignoff: Disiscriviti",
            "TalkUsername: Nome utente",
            "TalkPassword: Parola d’ordine",
            "TalkSubscriptionInfo: Adopera per favore il tuo nome e cognome. Per inserire una tua foto usa [Libravatar](https://libravatar.org/) o [Gravatar](https://gravatar.com/). Questo modulo serve anche per recuperare la parola d’ordine se la hai perduta.",
            "TalkSubscriptionMessage: Sei iscritto! Controlla la tua posta elettronica.",
            "TalkUnsubscriptionMessage: Non sei più iscritto.",
            "TalkFeed: Flusso RSS",
            "TalkNotAllowed: Credenziali mancanti o non valide: non sei autorizzato ad eseguire questa operazione.",
            "TalkMailSubject: Sei iscritto",
            "TalkMailMessage: Salve @name.\\n\\nEcco le tue credenziali:\\nNome utente: @username\\nParola d’ordine: @password",
            "TalkMailMessageFirst: Accedi a @url entro @expiry minuti. Se non hai chiesto tu l’iscrizione, ignora questo messaggio.",
            "CoreError422Title: Contenuto non elaborabile",
            "CoreError422Text: Un campo obbligatorio manca o non è valido: per favore torna indietro e completa o correggi il modulo.",
            "Language: fr",
            "TalkIndex: Index",
            "TalkStats: Groupe @group · Mis à jour @time · Réponses @answercount",
            "TalkHeading: Groupe @group · @description · Modérateur @moderator",
            "TalkNewQuestion: Nouvelle question",
            "TalkNewAnswer: Nouvelle réponse",
            "TalkLatestQuestions: Nouvelles questions",
            "TalkAuthor: Nom",
            "TalkEmail: Email",
            "TalkSubject: Object",
            "TalkText: Texte",
            "TalkPublish: Publier",
            "TalkMessageSent: Votre message a bien été publié. Merci !",
            "TalkEdit: Modifier",
            "TalkSignupLegend: Abonnement",
            "TalkSignoffLegend: Désabonnement",
            "TalkSignup: S’abonner",
            "TalkSignoff: Se désabonner",
            "TalkUsername: Nom d’utilisateur",
            "TalkPassword: Mot de passe",
            "TalkSubscriptionInfo: Veuillez indiquer votre nom complet. Pour télécharger une photo de vous, utilisez [Libravatar](https://libravatar.org/) ou [Gravatar](https://gravatar.com/). Ce formulaire sert également à récupérer votre mot de passe si vous l’avez oublié.",
            "TalkSubscriptionMessage: Vous êtes abonné ! Consultez votre boîte de réception.",
            "TalkUnsubscriptionMessage: Vous êtes désabonné.",
            "TalkFeed: Flux RSS",
            "TalkNotAllowed: Identifiants manquants ou incorrects : vous n’êtes pas autorisé à effectuer cette opération.",
            "TalkMailSubject: Vous êtes abonné",
            "TalkMailMessage: Bonjour @name.\\n\\nVoici vos identifiants:\\nNom d’utilisateur: @username\\nMot de passe: @password",
            "TalkMailMessageFirst: Connectez-vous à @url dans @expiry minutes. Si vous n’avez pas demandé votre abonnement, ignorez ce message.",
            "CoreError422Title: Contenu impossible à traiter",
            "CoreError422Text: Un champ obligatoire est manquante ou n’est pas valide, veuillez revenir en arrière et compléter ou corriger le formulaire.",
            "Language: es",
            "TalkIndex: Índice",
            "TalkStats: Grupo @group · Actualizado @time · Respuestas @answercount",
            "TalkHeading: Grupo @group · @description · Moderador @moderator",
            "TalkNewQuestion: Nueva pregunta",
            "TalkNewAnswer: Nueva respuesta",
            "TalkLatestQuestions: Últimas preguntas",
            "TalkAuthor: Nombre",
            "TalkEmail: Email",
            "TalkSubject: Asunto",
            "TalkText: Texto",
            "TalkPublish: Publicar",
            "TalkMessageSent: Publicaste un mensaje. ¡Gracias!",
            "TalkEdit: Editar",
            "TalkSignupLegend: Subscripción",
            "TalkSignoffLegend: Cancelación",
            "TalkSignup: Subscribirse",
            "TalkSignoff: Cancelar subscripción",
            "TalkUsername: Nombre de usuario",
            "TalkPassword: Contraseña",
            "TalkSubscriptionInfo: Indica tu nombre completo, por favor. Para subir una foto tuya, utiliza [Libravatar](https://libravatar.org/) o [Gravatar](https://gravatar.com/). Este formulario también sirve para recuperar la contraseña en caso de que la hayas olvidado.",
            "TalkSubscriptionMessage: ¡Estás subscribido! Comprueba tu bandeja de entrada.",
            "TalkUnsubscriptionMessage: Tu subscripción se ha cancelado.",
            "TalkFeed: Canal RSS",
            "TalkNotAllowed: Credenciales ausentes o incorrectas: no se te permite realizar esta operación.",
            "TalkMailSubject: Estás subscribido",
            "TalkMailMessage: Hola @name.\\n\\nEstas son tus credenciales:\\nNombre de usuario: @username\\nContraseña: @password",
            "TalkMailMessageFirst: Inicia sesión en @url en un plazo de @expiry minutos. Si no has solicitado tú mismo la subscripción, ignora este mensaje.",
            "CoreError422Title: Contenido no procesable",
            "CoreError422Text: Un campo obligatorio falta o no es válido: vuelve atrás y rellena o corrige el formulario, por favor.",
            "Language: pt",
            "TalkIndex: Índice",
            "TalkStats: Grupo @group · Atualizado @time · Respostas @answercount",
            "TalkHeading: Grupo @group · @description · Moderador @moderator",
            "TalkNewQuestion: Nova pergunta",
            "TalkNewAnswer: Nova resposta",
            "TalkLatestQuestions: Últimas perguntas",
            "TalkAuthor: Nome",
            "TalkEmail: Email",
            "TalkSubject: Assunto",
            "TalkText: Texto",
            "TalkPublish: Publicar",
            "TalkMessageSent: O seu mensagem foi publicado. Obrigado!",
            "TalkEdit: Editar",
            "TalkSignupLegend: Inscrição",
            "TalkSignoffLegend: Cancelamento",
            "TalkSignup: Inscrever-se",
            "TalkSignoff: Cancelar inscrição",
            "TalkUsername: Nome de usuário",
            "TalkPassword: Senha",
            "TalkSubscriptionInfo: Por favor, use seu nome completo. Para enviar uma foto sua, use [Libravatar](https://libravatar.org/) ou [Gravatar](https://gravatar.com/). Este formulário também serve para recuperar a senha, caso você a tenha perdido.",
            "TalkSubscriptionMessage: Você está inscrito! Verifique a sua caixa de entrada de e-mail.",
            "TalkUnsubscriptionMessage: A sua inscrição foi cancelada.",
            "TalkFeed: Feed RSS",
            "TalkNotAllowed: Credenciais ausentes ou inválidas: você não tem permissão para concluir esta operação.",
            "TalkMailSubject: Você está inscrito",
            "TalkMailMessage: Olá @name.\\n\\nAqui estão suas credenciais:\\nNome de usuário: @username\\nSenha: @password",
            "TalkMailMessageFirst: Inicie sessão em @url no prazo de @expiry minutos. Se você não solicitou a inscrição, ignore esta mensagem.",
            "CoreError422Title: Conteúdo não processável",
            "CoreError422Text: Um campo obrigatório está faltando ou não é válido: volte e preencha ou corrija o formulário, por favor.",
            "Language: nl",
            "TalkIndex: Index",
            "TalkStats: Groep @group · Bijgewerkt @time · Antwoorden @answercount",
            "TalkHeading: Groep @group · @description · Moderator @moderator",
            "TalkNewQuestion: Nieuwe vraag",
            "TalkNewAnswer: Nieuw antwoord",
            "TalkLatestQuestions: Nieuwste vragen",
            "TalkAuthor: Naam",
            "TalkEmail: E-mail",
            "TalkSubject: Onderwerp",
            "TalkText: Tekst",
            "TalkPublish: Publiceren",
            "TalkMessageSent: Je hebt je bericht gepubliceerd. Bedankt!",
            "TalkEdit: Bewerken",
            "TalkSignupLegend: Aanmelding",
            "TalkSignoffLegend: Aanmelding",
            "TalkSignup: Aanmelden",
            "TalkSignoff: Afmelden",
            "TalkUsername: Gebruikersnaam",
            "TalkPassword: Wachtwoord",
            "TalkSubscriptionInfo: Geef alstublieft uw volledige naam op. Om een foto van uzelf te uploaden, kunt u gebruikmaken van [Libravatar](https://libravatar.org/) of [Gravatar](https://gravatar.com/). Dit formulier kun je ook gebruiken om je wachtwoord te herstellen als je het bent vergeten.",
            "TalkSubscriptionMessage: Je bent aangemeld! Controleer je e-mailinbox.",
            "TalkUnsubscriptionMessage: Je bent uitgelogd.",
            "TalkFeed: RSS-feed",
            "TalkNotAllowed: Ontbrekende of ongeldige inloggegevens: je hebt geen toestemming om deze handeling uit te voeren.",
            "TalkMailSubject: Je bent aangemeld",
            "TalkMailMessage: Hallo @name.\\n\\nHier zijn je inloggegevens:\\nGebruikersnaam: @username\\nWachtwoord: @password",
            "TalkMailMessageFirst: Log binnen @expiry minuten in op @url. Als je deze aanmelding niet hebt aangevraagd, negeer dit bericht dan.",
            "CoreError422Title: Onverwerkbare inhoud",
            "CoreError422Text: Een verplicht veld ontbreekt of is ongeldig. Ga alstublieft terug en vul het formulier aan of corrigeer het.",
        ));
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="talk") {
            if ($this->isRequestXml($page)) {
                $page->set("restrict", null);

                if (!$page->isRequest("user") || !$page->isRequest("hash")) { $page->error(401); return; }
                $user = $page->getRequest("user");
                $hash = $page->getRequest("hash");
                $restrictFileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("restrictUserFile");
                $restrictData = $this->decodeData(":", @file_get_contents($restrictFileName));
                if (!isset($restrictData[$user]) || hash("sha256", $restrictData[$user][0])!==$hash) { $page->error(401); return; }

                $feedSeconds = $this->yellow->system->get("talkFeedDays")*86400;
                $group = $page->getRequest("group");
                $imageUrl = $this->getGroupImageUrl($group);
                $talkDirectory = $this->yellow->lookup->findMediaDirectory("talkLocation");
                $authorsFileName = $talkDirectory.$this->yellow->system->get("talkAuthorFile");
                $authors = $this->decodeData("|", @file_get_contents($authorsFileName));
                $talkFile = $talkDirectory.$this->yellow->system->get("talkFile");
                $talk = json_decode(@file_get_contents($talkFile), true) ?? [];
                $lastModified = 0;
                $this->yellow->page->setHeader("Content-Type", "application/rss+xml; charset=utf-8");
                $output = "<?xml version=\"1.0\" encoding=\"utf-8\"\077>\n";
                $output .= "<rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\" xmlns:atom=\"http://www.w3.org/2005/Atom\">\n";
                $output .= "<channel>\n";
                $output .= "<title>".$page->getHtml("sitename").($page->isRequest("group") ? ": ".htmlspecialchars($group) : "")."</title>\n";
                $output .= "<link>".$page->getUrl()."</link>\n";
                $output .= "<description>".$this->yellow->page->getHtml("description")."</description>\n";
                $output .= "<language>".$this->yellow->page->getHtml("language")."</language>\n";
                if (!is_null($imageUrl)) {
                    $output .= "<image>\n";
                    $output .= "<url>".$imageUrl."</url>\n";
                    $output .= "<title>".$page->getHtml("sitename").($page->isRequest("group") ? ": ".htmlspecialchars($group) : "")."</title>\n";
                    $output .= "<link>".$page->getUrl()."</link>\n";
                    $output .= "</image>\n";
                }
                $output .= "<atom:link href=\"".$page->getUrl().$this->yellow->lookup->normaliseArguments("page:".$this->yellow->system->get("talkFeedName"), false)."\" rel=\"self\" type=\"application/rss+xml\" />\n";
                foreach ($talk as $topicKey=>$topic) {
                    if ($topic["subject"]==="") continue;
                    if (!$page->isRequest("group") || strpos($topic["group"].".", $group.".")===0) {
                        $titleHtml = htmlspecialchars($this->toHtml($topic["subject"]));
                        $groupHtml = htmlspecialchars($topic["group"]);
                        $groupCount = $this->count($talk, $topic["group"]);
                        foreach ($topic["messages"] as $messageKey=>$message) {
                            if ($message[2]==="") continue;
                            if (time()-$message[1]<$feedSeconds) {
                                $lastModified = max($lastModified, $message[1]);
                                $output .= "<item>\n";
                                $output .= "<title>".($messageKey ? "Re: " : "").$titleHtml.($messageKey ? " ($messageKey)" : "")."</title>\n";
                                $output .= "<group>".$groupHtml."</group>\n";
                                $output .= "<guid isPermaLink=\"true\">".$page->getUrl()."topic:$topicKey/"."messages:$groupCount/".($messageKey ? "#".$messageKey : "")."</guid>\n";
                                // TODO: see http://www.faqs.org/rfcs/rfc4151.html
                                $output .= "<pubDate>".date(DATE_RSS, $message[1])."</pubDate>\n";
                                $output .= "<dc:creator>".htmlspecialchars($authors[$message[0]][0])."</dc:creator>\n";
                                $output .= "<description><![CDATA[".$this->toHtml($message[2], true)."]]></description>\n";
                                $output .= "</item>\n";
                            }
                        }
                    }
                }
                $output .= "</channel>\n";
                $output .= "</rss>\n";
                $this->yellow->page->setLastModified($lastModified);
                $this->yellow->page->setOutput($output);
            }
        }
    }

    // Parse delimiter-separated values using first value as key
    private function decodeData($delimiter, $content) {
        $result = [];
        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            if (trim($line)==="" or $line[0]==="#") continue;
            $parts = array_map("trim", explode($delimiter, $line, 3));
            $result[$parts[0]] = array_slice($parts, 1);
        }
        return $result;
    }

    // Count messages (also deleted ones) in group, author, or all groups
    private function count($talk, $filter = null, $isAuthor = false) {
        $total = 0;
        foreach ($talk as $topic) {
            if (!isset($filter)) {
                $total += count($topic["messages"]);
            } elseif (!$isAuthor) {
                if ($topic["group"]==$filter) $total += count($topic["messages"]);
            } else {
                foreach ($topic["messages"] as $message) {
                    if ($message[0]==$filter) $total++;
                }
            }
        }
        return $total;
    }

    // Return address of group image or default image, if any
    private function getGroupImageUrl($group) {
        $scheme = $this->yellow->system->get("coreServerScheme");
        $address = $this->yellow->system->get("coreServerAddress");
        $location = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("talkFeedImageLocation");
        $feedImageLocation = $this->yellow->lookup->findMediaDirectory("talkFeedImageLocation");
        $imageUrl = file_exists($feedImageLocation."default.png") ? "$scheme://$address$location"."default.png" : null;
        foreach ([ "png", "jpg", "jpeg", "gif" ] as $ext) {
            if (file_exists("$feedImageLocation$group.$ext")) {
                $imageUrl = "$scheme://$address$location$group.$ext";
                break;
            }
        }
        return $imageUrl;
    }

    // Parse a tiny subset of Markdown
    private function toHtml($text, $block = false) {
        $text = htmlspecialchars($text);
        $text = preg_replace([ "/^ +/m", "/ +$/m" ], "", $text);
        $text = preg_replace("/\*\*(.+?)\*\*/", "<b>$1</b>", $text);
        $text = preg_replace("/\*(.+?)\*/", "<i>$1</i>", $text);
        $text = preg_replace("/\&lt;(https?:\/\/[^\s]+)\&gt;/", "<a href=\"$1\">$1</a>", $text);
        $text = preg_replace("/\[(.*?)\]\((https?:\/\/[^\s)]+)\)/", "<a href=\"$2\">$1</a>", $text);
        if ($block) {
            $type = [];
            $lines = explode("\n", "\n".$text."\n");
            $text = "";
            foreach ($lines as $key=>$line) {
                if (substr($line, 0, 4)=="&gt;") { $lines[$key] = preg_replace("/^\&gt;\s*/", "", $line); $type[$key] = "b"; }
                elseif (substr($line, 0, 2)=="+ ") { $lines[$key] = preg_replace("/^\+\s+/", "", $line); $type[$key] = "l"; }
                else { $type[$key] = "n"; }
            }
            for ($i = 1; $i<count($lines)-1; $i++) {
                if ($lines[$i]==="") continue;
                if ($type[$i]=="l" && ($type[$i-1]!=="l")) $text .= "<ul>";
                elseif ($type[$i]=="b" && ($type[$i-1]!=="b")) $text .= "<blockquote>";
                if ($type[$i]=="l") $text .= "<li>".$lines[$i]."</li>";
                else {
                    if ($lines[$i-1]==="") $text .= "<p>";
                    $text .= $lines[$i];
                    if ($lines[$i+1]==="") $text .= "</p>";
                    else $text .= "<br />";
                }
                if ($type[$i]=="l" && ($type[$i+1]!=="l")) $text .= "</ul>";
                elseif ($type[$i]=="b" && ($type[$i+1]!=="b")) $text .= "</blockquote>";
            }
        }
        return $text;
    }

    // Handle page content element
    public function onParseContentElement($page, $name, $text, $attributes, $type) {
        $output = null;
        if ($name=="talk" && ($type=="block" || $type=="inline")) {
            if (!$this->yellow->extension->isExisting("restrict")) { $page->error(500, "Talk requires 'restrict' extension!"); return; }
            $this->checkConfirmed();
            $pages = $this->yellow->content->index()->filter("layout", "talk");
            if ($pages->isEmpty()) {
                $page->error(500, "Missing 'talk' main page"); return;
            } else {
                $url = $pages->offsetGet(0)->getUrl();
            }
            $tokenLifetime = $this->yellow->system->get("talkTokenLifetime")*60;
            list($action, $anchor) = $this->yellow->toolbox->getTextArguments($text);

            if ($action=="signup") {
                if ($page->getRequest("action")=="signup" && $this->uniqueToken($page->getRequest("unique-token"))) {
                    $email = strtolower(mb_substr(trim($page->getRequest("email")), 0, 264));
                    $name = mb_substr(preg_replace("/[^\p{L} '’]/u", "", trim($page->getRequest("name"))), 0, 264);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $name==="") {
                        $page->error(422);
                        return;
                    } else {
                        $status = $this->signUp($email, $name, $url);
                        if ($status==403) {
                            $page->error(403, $this->yellow->language->getTextHtml("talkNotAllowed")); return;
                        } elseif ($status==500) {
                            $page->error(500, "Inconsistency in database"); return;
                        }
                        $output = "<div class=\"talk-notice\" role=\"status\">".$this->yellow->language->getTextHtml("talkSubscriptionMessage")."</div>\n";
                    }
                } else {
                    //$output .= "<form aria-details=\"talk-signup-info\" ".$this->validation()."method=\"post\" class=\"talk-form talk-signup\">\n";
                    $output .= "<form aria-details=\"talk-signup-info\" ".$this->validation()."method=\"post\" class=\"talk-form talk-signup\" data-token-lifetime=\"".$tokenLifetime."\">\n";
                    $output .= "<fieldset>\n";
                    $output .= "<legend>".$this->yellow->language->getTextHtml("talkSignupLegend")."</legend>\n";
                    $output .= "<div><label>".$this->yellow->language->getTextHtml("talkEmail")."<br /><input class=\"form-control\" type=\"email\" size=\"70\" maxlength=\"264\" required=\"required\" name=\"email\" id=\"email\" value=\"\" /></label></div>\n";
                    $output .= "<div><label>".$this->yellow->language->getTextHtml("talkAuthor")."<br /><input class=\"form-control\" type=\"text\" size=\"70\" maxlength=\"264\" required=\"required\" pattern=\".*\S+.*\" name=\"name\" id=\"name\" value=\"\" /></label></div>\n";
                    $output .= "<input type=\"hidden\" name=\"action\" value=\"signup\"/>\n";
                    $output .= "<input type=\"hidden\" name=\"unique-token\" value=\"".htmlspecialchars($this->uniqueToken())."\"/>\n";
                    $output .= "<div><input class=\"btn\" type=\"submit\" value=\"".$this->yellow->language->getTextHtml("talkSignup")."\"></div>\n";
                    $output .= "</fieldset>\n";
                    $output .= "</form>\n";
                    $output .= "<p id=\"talk-signup-info\">".$this->toHtml($this->yellow->language->getText("TalkSubscriptionInfo"))."</p>\n";
                }
            } elseif ($action=="signoff") {
                if ($page->getRequest("action")=="signoff" && $this->uniqueToken($page->getRequest("unique-token"))) {
                    $username = trim($page->getRequest("username"));
                    $password = trim($page->getRequest("password"));
                    if ($username==="" || $password==="") { $page->error(422); return; }
                    $status = $this->signOff($username, $password);
                    if ($status==403) { $page->error(403, $this->yellow->language->getTextHtml("talkNotAllowed")); return; }
                    $output = "<div class=\"talk-notice\" role=\"status\">".$this->yellow->language->getTextHtml("talkUnsubscriptionMessage")."</div>\n";
                } else {
                    $output .= "<form ".$this->validation()."method=\"post\" class=\"talk-form talk-signoff\" data-token-lifetime=\"".$tokenLifetime."\">\n";
                    $output .= "<fieldset>\n";
                    $output .= "<legend>".$this->yellow->language->getTextHtml("talkSignoffLegend")."</legend>\n";
                    $output .= "<div><label>".$this->yellow->language->getTextHtml("talkUsername")."<br /><input class=\"form-control\" type=\"text\" size=\"70\" maxlength=\"264\" required=\"required\" pattern=\".*\S+.*\" name=\"username\" id=\"username\" value=\"\" /></label></div>\n";
                    $output .= "<div><label>".$this->yellow->language->getTextHtml("talkPassword")."<br /><input class=\"form-control\" type=\"password\" size=\"70\" maxlength=\"264\" required=\"required\" pattern=\".*\S+.*\" name=\"password\" id=\"password\" value=\"\" /></label></div>\n";
                    $output .= "<input type=\"hidden\" name=\"action\" value=\"signoff\"/>\n";
                    $output .= "<input type=\"hidden\" name=\"unique-token\" value=\"".htmlspecialchars($this->uniqueToken())."\"/>\n";
                    $output .= "<div><input class=\"btn\" type=\"submit\" value=\"".$this->yellow->language->getTextHtml("talkSignoff")."\"></div>\n";
                    $output .= "</fieldset>\n";
                    $output .= "</form>\n";
                }
            } elseif ($action=="url") {
                if ($anchor==="") $anchor = $this->yellow->language->getTextHtml("talkIndex");
                $output = "<a href=\"".htmlspecialchars($url)."\">".htmlspecialchars($anchor)."</a>";
            } elseif ($action=="expiry") {
                $pendingLifetime = $this->yellow->system->get("talkPendingLifetime");
                $output = htmlspecialchars($pendingLifetime);
            }
        }
        return $output;
    }

    // Subscribe new users
    public function signUp($email, $name, $url) {
        $talkDirectory = $this->yellow->lookup->findMediaDirectory("talkLocation");
        $authorsFileName = $talkDirectory.$this->yellow->system->get("talkAuthorFile");
        $restrictFileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("restrictUserFile");
        $fileHandle = fopen($authorsFileName, "c+");
        if (flock($fileHandle, LOCK_EX)) {
            $authorFileContent = stream_get_contents($fileHandle);
            $authors = $this->decodeData("|", $authorFileContent);
            $alreadySignedUp = false;
            foreach ($authors as $key=>$author) {
                if ($author[1]==$email) {
                    $username = $key;
                    $name = $authors[$username][0];
                    $restrictData = $this->decodeData(":", @file_get_contents($restrictFileName));
                    $password = isset($restrictData[$username]) ? $restrictData[$username][0] : null;
                    if (is_null($password)) return 500;
                    $alreadySignedUp = true;
                    break;
                }
            }
            if (!$alreadySignedUp) {
                $ip = $this->yellow->toolbox->getServer("REMOTE_ADDR");
                if ($this->checkIpEmail($ip, $email) && (!$this->yellow->system->isExisting("talkBlacklistPath") || !$this->isBlacklisted($email))) {
                    $passwordLength = $this->yellow->system->get("talkPasswordLength");
                    $username = $this->getNewUsername($authors);
                    $password = $this->randomString($passwordLength);
                    fseek($fileHandle, 0, SEEK_END);
                    fwrite($fileHandle, "{$username}|{$name}|{$email}\n");
                    $pendingDirectory = $this->yellow->lookup->findMediaDirectory("talkPendingLocation");
                    if (!is_dir($pendingDirectory)) mkdir($pendingDirectory, 0777);
                    file_put_contents("{$pendingDirectory}{$username}", "");
                    fflush($fileHandle);
                    file_put_contents($restrictFileName, "{$username}:{$password}\n", FILE_APPEND | LOCK_EX);
                } else {
                    return 403;
                }
            }
            flock($fileHandle, LOCK_UN);
            $sitename = $this->yellow->system->get("sitename");
            $siteEmail = $this->yellow->system->get("email");
            $expiry = $this->yellow->system->get("talkPendingLifetime");
            $mailHeaders = [
                "To" => $this->yellow->lookup->normaliseAddress("$name <$email>"),
                "From" => $this->yellow->lookup->normaliseAddress("$sitename <$siteEmail>"),
                "Subject" => $this->yellow->language->getText("talkMailSubject"),
                "Date" => date(DATE_RFC2822),
                "Content-Type" => "text/plain; charset=utf-8",
            ];
            $mailMessage = $this->yellow->language->getText("talkMailMessage")."\\n\\n".
                ($alreadySignedUp ? "" : $this->yellow->language->getText("talkMailMessageFirst")."\\n\\n").
                "-- \\n$sitename\\n$url\\n";
            $mailMessage = str_replace("\\n", "\r\n", $mailMessage);
            $mailMessage = str_replace (["@username", "@password", "@name", "@url", "@expiry"], [ $username, $password, $name, $url, $expiry ], $mailMessage);
            if (!$this->yellow->toolbox->mail("signup", $mailHeaders, $mailMessage)) {
                $this->yellow->page->error(500, $this->yellow->language->getText("contactStatusError"));
            }
        }
        fclose($fileHandle);
    }

    // Unsubscribe existing users
    public function signOff($username, $password, $force = false) {
        $talkDirectory = $this->yellow->lookup->findMediaDirectory("talkLocation");
        $authorsFileName = $talkDirectory.$this->yellow->system->get("talkAuthorFile");
        $restrictFileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("restrictUserFile");
        $authorsFileHandle = fopen($authorsFileName, "c+");
        $restrictFileHandle = fopen($restrictFileName, "c+");
        if (flock($authorsFileHandle, LOCK_EX) && flock($restrictFileHandle, LOCK_EX) ) {
            $authorFileContent = stream_get_contents($authorsFileHandle);
            $authors = $this->decodeData("|", $authorFileContent);
            $restrictFileContent = stream_get_contents($restrictFileHandle);
            $restrictData = $this->decodeData(":", $restrictFileContent);
            if (isset($authors[$username]) && isset($restrictData[$username]) && ($restrictData[$username][0]===$password || $force)) {
                $authors[$username] = [ "", "" ];
                ftruncate($authorsFileHandle, 0);
                rewind($authorsFileHandle);
                foreach ($authors as $key=>$author) {
                    fwrite($authorsFileHandle, "{$key}|{$author[0]}|{$author[1]}\n");
                }
                unset($restrictData[$username]);
                ftruncate($restrictFileHandle, 0);
                rewind($restrictFileHandle);
                foreach ($restrictData as $key=>$restrict) {
                    fwrite($restrictFileHandle, "{$key}:{$restrict[0]}".(isset($restrict[1]) ? "|$restrict[1]" : "")."\n");
                }
                $deleteSuccess = true;
            } else {
                $deleteSuccess = false;
            }
            flock($authorsFileHandle, LOCK_UN);
            flock($restrictFileHandle, LOCK_UN);
        }
        fclose($authorsFileHandle);
        fclose($restrictFileHandle);
        if (!$deleteSuccess) return 403;
    }

    // Check unconfirmed subscriptions
    public function checkConfirmed($username = "") {
        $pendingDirectory = $this->yellow->lookup->findMediaDirectory("talkPendingLocation");
        $pendingLifetime = $this->yellow->system->get("talkPendingLifetime")*60;
        $result = true;
        foreach (scandir($pendingDirectory, SCANDIR_SORT_NONE) as $entry) {
            $pendingPath = $pendingDirectory.$entry;
            if (is_file($pendingPath) && time()>@filemtime($pendingPath)+$pendingLifetime) {
                @unlink($pendingPath);
                $this->signOff($entry, "", true);
                if ($entry===$username) $result = false;
            }
        }
        $pendingPath = $pendingDirectory.$username;
        if (is_file($pendingPath)) @unlink($pendingPath);
        return $result;
    }

    // Check IP and email against whitelist and blacklist
    private function checkIpEmail($ip, $email) {
        $blacklist = $this->yellow->system->get("talkBlacklist");
        $whitelist = $this->yellow->system->get("talkWhitelist");
        $lists = [
            "black" => preg_split("/\s*,\s*/", $blacklist, -1, PREG_SPLIT_NO_EMPTY),
            "white" => preg_split("/\s*,\s*/", $whitelist, -1, PREG_SPLIT_NO_EMPTY),
        ];
        $emailDomain = explode("@", $email)[1];
        $check = [ "black"=>false, "white"=>false ];
        foreach ($lists as $key=>$items) {
            foreach ($items as $item) {
                preg_match("/^(.*?)((?:\.\*)*)$/", $item, $matches);
                if (filter_var($matches[1].str_repeat(".0", strlen($matches[2] ?? "")/2), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                    if (strpos($ip, $matches[1])===0) { $check[$key] = true; break; }
                } else {
                    if ($emailDomain===$item) { $check[$key] = true; break; }
                }
            }
        }
        if ($check["black"]) return false;
        if (count($lists["white"])==0) {
            return true;
        } else {
            return $check["white"];
        }
    }

    // Check email against disposable email list
    private function isBlacklisted($email) {
        $blacklistPath = $this->yellow->system->get("talkBlacklistPath");
        $blacklistDomains = file($blacklistPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($blacklistDomains===false) return false;
        $blacklistMap = array_flip($blacklistDomains);
        $domainParts = explode(".", strtolower(explode('@', trim($email))[1]));
        for ($i = 0; $i<count($domainParts)-1; $i++) {
            $domain = implode(".", array_slice($domainParts, $i));
            if (isset($blacklistMap[$domain])) return true;
        }
        return false;
    }

    // Return new unique username
    private function getNewUsername($authors) {
        $newUsernamePrefix = $this->yellow->system->get("talkNewUsernamePrefix");
        $suffix = 0;
        while (isset($authors[$newUsernamePrefix.$suffix])) $suffix++;
        return $newUsernamePrefix.$suffix;
    }

    // Return random string
    private function randomString($length = 12) {
        $characters = "abcdefghijklmnopqrstuvwxyz0123456789";
        $string = "";
        $lastIndex = strlen($characters)-1;
        for ($i=0; $i<$length; $i++) {
            $string .= $characters[random_int(0, $lastIndex)];
        }
        return $string;
    }

    // Return attribute to disable client-side validation
    public function validation() {
        $clientSideValidation = $this->yellow->system->get("talkClientSideValidation");
        return $clientSideValidation ? "" : "novalidate=\"novalidate\" ";
    }

    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $assetLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreAssetLocation");
            $output = "<link rel=\"stylesheet\" media=\"all\" href=\"{$assetLocation}talk.css\" />\n";
            $output .= "<script defer=\"defer\" src=\"{$assetLocation}talk.js\"></script>\n";
            if ($page->get("layout")=="talk" && !$page->isRequest("topic") && !$page->isRequest("author")) {
                $feedLocation = $this->getFeedLocation($page);
                $output .= "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"$feedLocation\" />\n";
            }
        }

        if ($name=="talk") {
            if (!$this->yellow->extension->isExisting("restrict")) { $page->error(500, "Talk requires 'restrict' extension!"); return; }
            $textMaxLength = $this->yellow->system->getHtml("talkTextMaxLength");
            $talkDirectory = $this->yellow->lookup->findMediaDirectory("talkLocation");
            $groupFile = $talkDirectory.$this->yellow->system->get("talkGroupFile");
            $groups = $this->scanGroups($groupFile);
            if (!$groups[1]) { $page->error(500, "Empty '$groupFile' file!"); return; }
            $listStyle = $this->yellow->system->get("talkListStyle");
            $authorsFileName = $talkDirectory.$this->yellow->system->get("talkAuthorFile");
            $authors = $this->decodeData("|", @file_get_contents($authorsFileName));
            $userKey = $this->yellow->toolbox->getServer("PHP_AUTH_USER");
            if (!$this->checkConfirmed($userKey)) { $page->error(403, $this->yellow->language->getTextHtml("talkNotAllowed")); return; }
            $forbiddenFile = $talkDirectory.$this->yellow->system->get("talkForbiddenFile");
            $forbidden = $this->decodeData("|", @file_get_contents($forbiddenFile));
            $talkFile = $talkDirectory.$this->yellow->system->get("talkFile");
            $dateFormat = $this->yellow->language->getText("coreDateFormatLong");
            $isUniqueToken = $page->isRequest("unique-token") && $this->uniqueToken($page->getRequest("unique-token"));
            $tokenLifetime = $this->yellow->system->get("talkTokenLifetime")*60;

            $fileHandle = fopen($talkFile, "c+");
            if (flock($fileHandle, LOCK_EX)) {
                $talk = json_decode(stream_get_contents($fileHandle), true) ?? [];
                if (!$talk && fstat($fileHandle)["size"]>0) { $page->error(500, "Corrupt '$talkFile' file!"); return; }
                if ($isUniqueToken && !isset($forbidden[$userKey])) {
                    if ($page->isRequest("message")) {
                        $topicKey = $page->getRequest("topic");
                        $messageKey = $page->getRequest("message");
                        if (!isset($talk[$topicKey]) || !isset($talk[$topicKey]["messages"][$messageKey])) { $page->error(400); return; }
                        $group = $talk[$topicKey]["group"];
                        $moderatorKey = $groups[1][$group][1];
                        $isModerator = $moderatorKey == $userKey;
                        if ($isModerator) {
                            $oldText = $talk[$topicKey]["messages"][$messageKey][2];
                            $talk[$topicKey]["messages"][$messageKey][2] = str_replace("\r", "", mb_substr(trim($page->getRequest("text")), 0, $textMaxLength));
                            $talk[$topicKey]["messages"][$messageKey][3] ??= [];
                            $talk[$topicKey]["messages"][$messageKey][3][] = [ $moderatorKey, time(), $oldText ];
                            if ($messageKey==0) {
                                $oldSubject = $talk[$topicKey]["subject"];
                                $talk[$topicKey]["subject"] = $page->getRequest("subject");
                                $backupNumber = count($talk[$topicKey]["messages"][$messageKey][3]);
                                $talk[$topicKey]["messages"][$messageKey][3][$backupNumber-1][] = $oldSubject;
                            }
                        }
                    } else {
                        if (!isset($authors[$userKey])) { $page->error(400); return; }
                        if ($page->isRequest("subject")) {
                            $subject = trim($page->getRequest("subject"));
                            if ($subject==="") { $page->error(422); return; }
                        }
                        $text = str_replace("\r", "", mb_substr(trim($page->getRequest("text")), 0, $textMaxLength));
                        if ($text==="") { $page->error(422); return; }
                        $message = [ $userKey, time(), $text ];

                        if ($page->isRequest("topic")) {
                            $topicKey = $page->getRequest("topic");
                            if (!isset($talk[$topicKey])) { $page->error(400); return; }
                            $talk[$topicKey]["messages"][] = $message;
                        } else {
                            $group = $page->getRequest("group");
                            if (!isset($groups[1][$group])) { $page->error(400); return; }
                            $talk[] = [
                                "subject" => $subject,
                                "group" => $group,
                                "messages"=> [ $message ]
                            ];
                       }
                    }

                    ftruncate($fileHandle, 0);
                    rewind($fileHandle);
                    fwrite($fileHandle, json_encode($talk, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
                    fflush($fileHandle);
                }
                flock($fileHandle, LOCK_UN);
            }
            fclose($fileHandle);
            $countAll = $this->count($talk);

            if ($page->isRequest("topic")) {
                $topicKey = $page->getRequest("topic");
                if (!isset($talk[$topicKey])) { $page->error(404); return; }
                if ($talk[$topicKey]["subject"]==="") { $page->error(410, "Gone"); return; }
            } elseif ($page->isRequest("group")) {
                $group = $page->getRequest("group");
                if (!isset($groups[1][$group])) { $page->error(404); return; }
            } elseif ($page->isRequest("author")) {
                $authorKey = $page->getRequest("author");
                if (!isset($authors[$authorKey])) { $page->error(404); return; }
            }

            if ($page->isRequest("topic")) {
                $topic = $talk[$topicKey];
                $group = $topic["group"];
                $groupCount = $this->count($talk, $group);

                $moderatorKey = $groups[1][$group][1];
                $isModerator = $moderatorKey == $userKey;
                $isModeration = $isModerator && $page->isRequest("message") && $page->getRequest("status")!=="done";

                $output .= "<div class=\"talk-index\"><a href=\"".$page->getLocation(true)."messages:$countAll/"."\">".$this->yellow->language->getTextHtml("talkIndex")."</a>";
                $output .= " &gt; <a href=\"".$this->yellow->page->getLocation(true).$this->yellow->lookup->normaliseArguments("group:$group")."messages:$groupCount/"."\">".htmlspecialchars($group)."</a>";
                $output .= " &gt; <span class=\"talk-selected\">".$this->toHtml($topic["subject"]).($isModeration ? " [".$page->getRequest("message")."]" : "")."</span></div>\n";
                $output .= "<h2 class=\"talk-notice\">".$this->toHtml($topic["subject"])."</h2>\n";
                $output .= $this->getTopicStats($topic, $dateFormat);

                if ($isModeration) {
                    $output .= "<form ".$this->validation()."action=\"".$page->getLocation(true)."topic:$topicKey/messages:".count($talk[$topicKey]["messages"])."/\" method=\"post\" class=\"talk-form\" data-token-lifetime=\"".$tokenLifetime."\">\n";
                    if ($page->getRequest("message")==0) $output .= "<div><label>".$this->yellow->language->getTextHtml("talkSubject")."<br /><input class=\"form-control\" type=\"text\" size=\"70\" maxlength=\"80\" name=\"subject\" id=\"subject\" value=\"".htmlspecialchars($talk[$topicKey]["subject"])."\" /></label></div>\n";
                    $output .= "<div><label><span class=\"talk-md\">".$this->yellow->language->getTextHtml("talkText")."</span><br /><textarea class=\"form-control\" name=\"text\" id=\"text\" rows=\"10\" cols=\"60\" maxlength=\"".$textMaxLength."\">".htmlspecialchars($talk[$topicKey]["messages"][$page->getRequest("message")][2])."</textarea></label></div>\n";
                    $output .= "<div><b>".$authors[$talk[$topicKey]["messages"][$page->getRequest("message")][0]][0]."</b></div>\n";
                    $output .= "<input type=\"hidden\" name=\"message\" value=\"".htmlspecialchars($page->getRequest("message"))."\"/>\n";
                    $output .= "<input type=\"hidden\" name=\"moderator\" value=\"".htmlspecialchars($moderatorKey)."\"/>\n";
                    $output .= "<input type=\"hidden\" name=\"unique-token\" value=\"".htmlspecialchars($this->uniqueToken())."\"/>\n";
                    $output .= "<input type=\"hidden\" name=\"status\" value=\"done\"/>\n";
                    $output .= "<div><input class=\"btn\" type=\"submit\" value=\"".$this->yellow->language->getTextHtml("talkPublish")."\"></div>\n";
                    $output .= "</form>\n";
                } else {
                    $edit = $this->yellow->language->getTextHtml("talkEdit");
                    foreach ($topic["messages"] as $messageKey=>$message) {
                        if ($message[2]==="" || $topic["subject"]==="") continue;
                        $authorCount = $this->count($talk, $message[0], true);
                        $output .= "<article class=\"talk-message".($moderatorKey==$message[0] ? " talk-moderator" : "")."\" id=\"".$messageKey."\">\n";
                        $output .= "<div class=\"talk-text\">".$this->toHtml($message[2], true)."</div>\n";
                        $output .= "<footer>\n";
                        $output .= "<div class=\"talk-author\"><a rel=\"author\" href=\"".$this->yellow->page->getLocation(true).$this->yellow->lookup->normaliseArguments("author:".$message[0])."messages:$authorCount/"."\">".htmlspecialchars($authors[$message[0]][0] ?: "[{$message[0]}]")."</a></div>\n";
                        $output .= "<div class=\"talk-stats\">".htmlspecialchars($this->yellow->language->getDateFormatted($message[1], $dateFormat))."</div>\n";
                        $output .= $isModerator ? "<div><a href=\"".$this->yellow->page->getLocation(true)."topic:$topicKey/"."message:$messageKey/"."\">".$edit."</a></div>\n" : "";
                        $output .= "</footer>\n";
                        $output .= "</article>\n";
                    }

                    if ($isUniqueToken) {
                        $output .= "<div class=\"talk-notice\" role=\"status\">".$this->yellow->language->getTextHtml("talkMessageSent")."</div>\n";
                    } elseif (!isset($forbidden[$userKey])) {
                        $output .= "<h2 class=\"talk-notice\">".$this->yellow->language->getTextHtml("talkNewAnswer")."</h2>\n";
                        $output .= "<form ".$this->validation()."method=\"post\" class=\"talk-form\" data-token-lifetime=\"".$tokenLifetime."\">\n";
                        $output .= "<div><label><span class=\"talk-md\">".$this->yellow->language->getTextHtml("talkText")."</span><br /><textarea class=\"form-control\" required=\"required\" pattern=\".*\S+.*\" name=\"text\" id=\"text\" rows=\"10\" cols=\"60\" maxlength=\"".$textMaxLength."\"></textarea></label></div>\n";
                        $output .= "<div><b>".$authors[$userKey][0]."</b></div>\n";
                        $output .= "<input type=\"hidden\" name=\"unique-token\" value=\"".htmlspecialchars($this->uniqueToken())."\"/>\n";
                        $output .= "<div><input class=\"btn\" type=\"submit\" value=\"".$this->yellow->language->getTextHtml("talkPublish")."\"></div>\n";
                        $output .= "</form>\n";
                    }
                }
            } elseif ($page->isRequest("author")) {
                $output .= "<div class=\"talk-index\"><a href=\"".$page->getLocation(true)."messages:$countAll/"."\">".$this->yellow->language->getTextHtml("talkIndex")."</a>";
                $authorName = $authors[$authorKey][0] ?: "[{$authorKey}]";
                $output .= " &gt; <span class=\"talk-selected\">".htmlspecialchars($authorName)."</span></div>\n";
                $showAvatar = $this->yellow->system->get("talkShowAvatar");
                if ($showAvatar) {
                    $output .= "<div><img height=\"80\" width=\"80\" src=\"https://seccdn.libravatar.org/avatar/".hash("sha256", $authors[$authorKey][1])."?d=mp\" alt=\"".htmlspecialchars($authorName)."\" /></div>\n";
                }
                $output .= "<h2 class=\"talk-notice\">".htmlspecialchars($authorName)."</h2>\n";

                $authorMessages = [];
                foreach ($talk as $topicKey=>$topic) {
                    if ($topic["subject"]==="") continue;
                    foreach ($topic["messages"] as $messageKey=>$message) {
                        if ($message[2]==="") continue;
                        if ($message[0]==$authorKey) {
                            $authorMessages[$message[1]] = [
                                $topicKey,
                                $messageKey,
                                $message[2],
                            ];
                        }
                    }
                }
                krsort($authorMessages);
                foreach ($authorMessages as $authorMessageDate=>$authorMessage) {
                    $topicCount = count($talk[$authorMessage[0]]["messages"]);
                    $moderatorKey = $groups[1][$talk[$authorMessage[0]]["group"]][1];
                    $output .= "<article class=\"talk-message".($moderatorKey==$authorKey ? " talk-moderator" : "")."\" id=\"".$messageKey."\">\n";
                    $output .= "<div><a class=\"talk-title\" href=\"".$page->getLocation(true)."topic:{$authorMessage[0]}/"."messages:$topicCount/"."#".$authorMessage[1]."\">".$this->toHtml($talk[$authorMessage[0]]["subject"])." [".$authorMessage[1]."]</a></div>\n";
                    $output .= $this->getTopicStats($talk[$authorMessage[0]], $dateFormat);

                    $output .= "<div class=\"talk-text\">".$this->toHtml($authorMessage[2], true)."</div>\n";
                    $output .= "<div class=\"talk-stats\">".htmlspecialchars($this->yellow->language->getDateFormatted($authorMessageDate, $dateFormat))."</div>\n";
                    $output .= "</article>\n";
                }
            } else {
                if ($page->isRequest("group")) {
                    $output .= "<div class=\"talk-index\"><a href=\"".$page->getLocation(true)."messages:$countAll/"."\">".$this->yellow->language->getTextHtml("talkIndex")."</a>";
                    $output .= " &gt; <span class=\"talk-selected\">".htmlspecialchars($group)."</span></div>\n";
                    $heading = $this->yellow->language->getTextHtml("talkHeading");
                    $moderator = $authors[$groups[1][$group][1]][0] ?: "[{$groups[1][$group][1]}]";
                    $description = $groups[1][$group][0];
                    $output .= "<h2 class=\"talk-notice\" role=\"heading\" aria-level=\"2\">".htmlspecialchars(str_replace([ "@group", "@description", "@moderator" ], [ $group, $description, $moderator ], $heading))."</h2>\n";
                    $isModerator = $moderatorKey == $userKey;
                } else {
                    $output .= "<div class=\"talk-groups\">\n";
                    if ($listStyle=="flat") {
                        $output .= "<ul>";
                        foreach ($groups[1] as $group=>$groupAttributes) {
                            $groupCount = $this->count($talk, $group);
                            $output .= "<li><a href=\"".$this->yellow->page->getLocation(true).$this->yellow->lookup->normaliseArguments("group:$group")."messages:$groupCount/"."\">".htmlspecialchars($group)."</a> ".$value[0]."</li>";
                        }
                        $output .= "</ul>";
                    } else {
                        $output .= $this->getGroupList($groups[0], $talk, $listStyle=="expandable");
                    }
                    $output .= "</div>\n";
                }

                if (!$page->isRequest("group")) {
                    $output .= "<h2 class=\"talk-notice\">".$this->yellow->language->getTextHtml("TalkLatestQuestions")."</h2>\n";
                }
                $latestTopicsNumber = $this->yellow->system->get("talkLatestQuestionsNumber");
                $topicNumber = 0;
                foreach (array_reverse($talk, true) as $topicKey=>$topic) {
                    if ($topic["subject"]==="") continue;
                    if (!isset($groups[1][$topic["group"]])) continue;
                    $topicCount = count($topic["messages"]);
                    if (!$page->isRequest("group") || $topic["group"]==$group) {
                        if (!$page->isRequest("group")) {
                            $topicNumber++;
                            if ($topicNumber>$latestTopicsNumber) break;
                        }
                        $output .= "<article class=\"talk-message\">\n";
                        $output .= "<div><a class=\"talk-title\" href=\"".$page->getLocation(true)."topic:$topicKey/"."messages:$topicCount/"."\">".$this->toHtml($topic["subject"])."</a></div>\n";
                        $output .= $this->getTopicStats($topic, $dateFormat);
                        $output .= "</article>\n";
                    }
                }

                if ($isUniqueToken) {
                    $output .= "<div class=\"talk-notice\" role=\"status\">".$this->yellow->language->getTextHtml("talkMessageSent")."</div>\n";
                } elseif ($page->isRequest("group") && !isset($forbidden[$userKey])) {
                    $output .= "<h2 class=\"talk-notice\">".$this->yellow->language->getTextHtml("talkNewQuestion")."</h2>\n";
                    $output .= "<form ".$this->validation()."method=\"post\" class=\"talk-form\" data-token-lifetime=\"".$tokenLifetime."\">\n";
                    $output .= "<div><label>".$this->yellow->language->getTextHtml("talkSubject")."<br /><input class=\"form-control\" type=\"text\" size=\"70\" maxlength=\"80\" required=\"required\" pattern=\".*\S+.*\" name=\"subject\" id=\"subject\" value=\"\" /></label></div>\n";
                    $output .= "<input type=\"hidden\" name=\"group\" value=\"".htmlspecialchars($group)."\"/>\n";
                    $output .= "<div><label><span class=\"talk-md\">".$this->yellow->language->getTextHtml("talkText")."</span><br /><textarea class=\"form-control\" required=\"required\" pattern=\".*\S+.*\" name=\"text\" id=\"text\" rows=\"10\" cols=\"60\" maxlength=\"".$textMaxLength."\"></textarea></label></div>\n";
                    $output .= "<div><b>".$authors[$userKey][0]."</b></div>\n";
                    $output .= "<input type=\"hidden\" name=\"unique-token\" value=\"".htmlspecialchars($this->uniqueToken())."\"/>\n";
                    $output .= "<div><input class=\"btn\" type=\"submit\" value=\"".$this->yellow->language->getTextHtml("talkPublish")."\"></div>\n";
                    $output .= "</form>\n";
                }
            }

            if (!$page->isRequest("topic") && !$page->isRequest("author")) {
                $feedLocation = $this->getFeedLocation($page);
                $output .= "<div id=\"rss\"><a href=\"".$feedLocation."\">".$this->yellow->language->getTextHtml("talkFeed")."</a></div>\n";
            }
        }
        return $output;
    }

    // Scan groups and return hyerarchical structure and flat list
    private function scanGroups($fileName) {
        $hierarchy = $linear = [];
        $lines = @file($fileName) ?: [];
        sort($lines);
        foreach ($lines as $num=>$line) {
            if (trim($line)==="" or $line[0]==="#") continue;
            $parts = array_map("trim", explode("|", $line));
            $linear[$parts[0]] = array_slice($parts, 1);
            $segments = explode(".", $parts[0]);
            $current = &$hierarchy;
            foreach ($segments as $index=>$segment) {
                if ($index==count($segments)-1) {
                    $current[$segment] = $parts[1];
                } else {
                    $current[$segment] ??= [];
                    $current = &$current[$segment];
                }
            }
        }
        return [ $hierarchy, $linear ];
    }

    // Return a nested list of group
    private function getGroupList($hierarchy, $talk, $expandable, $prefix = "") {
        $separator = ".";
        $html = "<ul".($expandable && $prefix=="" ? " class=\"filelist-collapsible\"" : "").">";
        foreach ($hierarchy as $key=>$value) {
            $name = ltrim($prefix.$separator.$key, $separator);
            if (is_array($value)) {
                $html .= "<li".($expandable ? " class=\"filelist-directory\"" : "")."><span>";
                $html .= "<i>$name</i></span>\n";
                $html .= $this->getGroupList($value, $talk, $expandable, $name);
                $html .= "</li>\n";
            } else {
                $html .= "<li".($expandable ? " class=\"filelist-file\"" : "")."><span".($expandable ? " class=\"filelist-basename\"" : "").">";
                $groupCount = $this->count($talk, $name);
                $html .= "<a class=\"talk-groupname\" href=\"".
                    $this->yellow->page->getLocation(true).
                    $this->yellow->lookup->normaliseArguments("group:$name").
                    "messages:$groupCount/"."\">".
                    htmlspecialchars($name)."</a> ".
                    htmlspecialchars($value);
                $html .= "</span></li>\n";
            }
        }
        $html .= "</ul>\n";
        return $html;
    }

    // Return or check a unique token to avoid double submissions
    private function uniqueToken($token = null) {
        $tokenDirectory = $this->yellow->lookup->findMediaDirectory("talkTokenLocation");
        if (!is_dir($tokenDirectory)) mkdir($tokenDirectory, 0777);
        $tokenLifetime = $this->yellow->system->get("talkTokenLifetime")*60;
        if ($token===null) {
            return basename(tempnam($tokenDirectory, ""));
        } else {
            if (preg_match("/[^0-9A-Za-z]/", $token)) { $this->yellow->page->error(500, "Bad token!"); return; }
            foreach (scandir($tokenDirectory, SCANDIR_SORT_NONE) as $file) {
                $path = $tokenDirectory.$file;
                if (is_file($path) && time()>filemtime($path)+$tokenLifetime) @unlink($path);
            }
            return @unlink($tokenDirectory.$token);
        }
    }

    // Return statistics for topic
    private function getTopicStats($topic, $dateFormat) {
        $time = null;
        $answerCount = -1;
        foreach (array_reverse($topic["messages"]) as $message) {
            if ($message[2]!=="") {
                $answerCount++;
                $time = $time ?? $message[1];
            }
        }
        return "<div class=\"talk-stats\">".str_replace([ "@group", "@time", "@answercount" ],
            [ htmlspecialchars($topic["group"]), htmlspecialchars($this->yellow->language->getDateRelative($time, $dateFormat, 30)), $answerCount ],
            $this->yellow->language->getTextHtml("talkStats"))."</div>\n";
    }

    // Return feed location
    public function getFeedLocation($page) {
        $restrictFileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("restrictUserFile");
        $restrictData = $this->decodeData(":", @file_get_contents($restrictFileName));
        $userKey = $this->yellow->toolbox->getServer("PHP_AUTH_USER");
        $hash = hash("sha256", $restrictData[$userKey][0]);

        $feedLocation = $page->getUrl().
            ($page->isRequest("group") ? $this->yellow->lookup->normaliseArguments("group:".$page->getRequest("group")) : "").
            $this->yellow->lookup->normaliseArguments("user:".$userKey).
            "hash:$hash/".
            $this->yellow->lookup->normaliseArguments("page:".$this->yellow->system->get("talkFeedName"), false);
        return $feedLocation;
    }

    // Check if XML requested
    public function isRequestXml($page) {
        return $page->getRequest("page")==$this->yellow->system->get("talkFeedName");
    }
}
