
$('#reg_form').bootstrapValidator({
 // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
 feedbackIcons: {
 valid: 'glyphicon glyphicon-ok',
 invalid: 'glyphicon glyphicon-remove',
 validating: 'glyphicon glyphicon-refresh'
 },
 fields: {
 name: {
 validators: {
 stringLength: {
min: 2,
 },
 notEmpty: {
message: 'Veuillez saisir votre nom'
 }
 }
 },

 email: {
 validators: {
 notEmpty: {
 message: 'Veuillez saisir votre email'
 },
emailAddress: {
 message: 'Email valide'
 }
 }
 },

 password: {
 validators: {
 identical: {
 field: 'password_confirmation',
 message: 'Veuillez confirmer votre mot de passe - le même'
 },
notEmpty: {
 message: 'Veuillez saisir un mot de passe'
 }
 }
 },
 password_confirmation: {
 validators: {
 identical: {
 field: 'password',
 message: 'Pas le même'
 },
 notEmpty: {
 message: 'Veuillez confirmer votre mot de passe'
 }
 }
 },
 }
 })

 .on('success.form.bv', function(e) {
 $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
 $('#reg_form').data('bootstrapValidator').resetForm();
 // Prevent form submission
 e.preventDefault();
 // Get the form instance
 var $form = $(e.target);
 // Get the BootstrapValidator instance
 var bv = $form.data('bootstrapValidator');
 // Use Ajax to submit form data
 $.post($form.attr('action'), $form.serialize(), function(result) {
 console.log(result);
 }, 'json');
 });