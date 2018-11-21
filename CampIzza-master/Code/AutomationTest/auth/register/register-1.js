var webdriverio = require('webdriverio');

var options = {
  desiredCapabilities: {
    browserName: 'chrome'
  }
};

webdriverio
  .remote(options)
  .init()
  .url('http://localhost:8000/register')

  .setValue('#input-email', 'vhnam2504@gmail.com')
  .setValue('#input-password', '123123')
  .setValue('#password-confirm', '123123')

  .click('#btn-submit')

  .end()

  .catch(function(err) {
    console.error(err);
  });
