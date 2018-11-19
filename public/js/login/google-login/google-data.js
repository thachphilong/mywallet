function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var data_user = [];
    data_user.push('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    data_user.push('Name: ' + profile.getName());
    data_user.push('Image URL: ' + profile.getImageUrl());
    data_user.push('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  }