<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/includes/security.php';
$pageTitle = 'Contact Equus | Send a Message';
$pageDescription = 'Contact Equus with questions or feedback about this horse education project.';
$activePage = 'Contact'; $pageCss = 'css/contact.css';
$status = ''; $statusType = 'success'; $name = ''; $email = ''; $messageText = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim((string)($_POST['name'] ?? '')); $email = trim((string)($_POST['email'] ?? '')); $messageText = trim((string)($_POST['message'] ?? ''));
  $lastSubmit = (int)($_SESSION['contact_last_submit'] ?? 0);
  if (!csrf_valid()) { $status='Your session expired. Refresh the page and try again.'; $statusType='error'; }
  elseif (time() - $lastSubmit < 15) { $status='Please wait a few seconds before sending another message.'; $statusType='error'; }
  elseif ((function_exists('mb_strlen') ? mb_strlen($name, 'UTF-8') : strlen($name)) < 2 || (function_exists('mb_strlen') ? mb_strlen($name, 'UTF-8') : strlen($name)) > 100) { $status='Name must be between 2 and 100 characters.'; $statusType='error'; }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || (function_exists('mb_strlen') ? mb_strlen($email, 'UTF-8') : strlen($email)) > 190) { $status='Please enter a valid email address.'; $statusType='error'; }
  elseif ((function_exists('mb_strlen') ? mb_strlen($messageText, 'UTF-8') : strlen($messageText)) < 10 || (function_exists('mb_strlen') ? mb_strlen($messageText, 'UTF-8') : strlen($messageText)) > 4000) { $status='Message must be between 10 and 4,000 characters.'; $statusType='error'; }
  else {
    try { $stmt=$pdo->prepare('INSERT INTO contacts (name,email,message) VALUES (:name,:email,:message)'); $stmt->execute([':name'=>$name,':email'=>$email,':message'=>$messageText]); $_SESSION['contact_last_submit']=time(); $_SESSION['csrf_token']=bin2hex(random_bytes(32)); $status='Thank you. Your message has been saved in the website database.'; $name=$email=$messageText=''; }
    catch (PDOException $e) { $status='We could not save your message right now. Please try again later.'; $statusType='error'; }
  }
}
require __DIR__ . '/includes/header.php';
?>
<main id="main-content"><section class="page-hero"><div class="wrap"><span class="eyebrow">Get in touch</span><h1>Let’s start a conversation.</h1><p>Questions, feedback or ideas for the Equus project are welcome. Please do not send passwords or other sensitive information.</p></div></section>
<section class="section"><div class="wrap contact-layout"><aside class="contact-aside"><span class="eyebrow">Contact Equus</span><h2>We’d love to hear from you.</h2><p>This portfolio project saves messages to its local database. It does not currently send email notifications.</p><div class="contact-detail"><span>Project</span><strong>Horse knowledge & equestrian life</strong></div><div class="contact-detail"><span>Response</span><strong>Local demo — no response-time guarantee</strong></div></aside>
<form class="panel" action="contact.php" method="post"><input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
<?php if ($status !== ''): ?><p class="form-message <?= $statusType === 'error' ? 'error' : '' ?>" role="<?= $statusType === 'error' ? 'alert' : 'status' ?>"><?= e($status) ?></p><?php endif; ?>
<div class="form-grid"><div class="field"><label for="name">Your name</label><input id="name" name="name" type="text" autocomplete="name" minlength="2" maxlength="100" value="<?= e($name) ?>" required></div><div class="field"><label for="email">Email address</label><input id="email" name="email" type="email" autocomplete="email" maxlength="190" value="<?= e($email) ?>" required></div><div class="field field-full"><label for="message">Message</label><textarea id="message" name="message" minlength="10" maxlength="4000" required><?= e($messageText) ?></textarea><p class="privacy-small">Your name, email and message are stored in the local website database for this demo. See the <a href="privacy.php"><u>privacy notice</u></a>.</p></div><div class="field field-full"><button class="btn" type="submit">Send message <span aria-hidden="true">→</span></button></div></div></form></div></section></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
