var webdriverio = require('webdriverio');

var options = {
  desiredCapabilities: {
    browserName: 'chrome'
  }
};

webdriverio
  .remote(options)
  .init()
  .url('http://localhost:8000/login')

  .setValue('#input-email', 'vhnam2504@gmail.com')
  .setValue('#input-password', '123123')

  .click('#btn-submit')

  .setValue('#input-parent-1', 'Stacy Danette Russell')
  .setValue('#input-parent-2', 'James Alan Russell')
  .setValue('#input-address-1', '426 Wycliffe')
  .setValue('#input-address-2', '')
  // .setValue('#input-email-1', '')
  .setValue('#input-email-2', '')
  .selectByValue('#input-country', '233')
  .selectByValue('#input-state', '5')
  .setValue('#input-city', 'Los Angeles')
  .setValue('#input-zipcode', '92602')

  .setValue('#input-phone-1', '9493736949')
  .setValue('#input-phone-2', '9492742051')
  .setValue('#input-phone-3', '5038714306')
  .setValue('#input-phone-4', '')
  .selectByValue('#input-phone-type-1', 'cell')
  .selectByValue('#input-phone-type-2', 'cell')
  .selectByValue('#input-phone-type-3', 'other')
  // .selectByValue('#input-phone-type-4', '')

  .setValue('#input-emergency-name-1', 'Joyce Nagle')
  .setValue('#input-emergency-name-2', 'Madison Fong')
  .setValue('#input-emergency-relationship-1', 'Granmother')
  .setValue('#input-emergency-relationship-2', 'Nanny')
  .setValue('#input-emergency-phone-1', '5038714306')
  .setValue('#input-emergency-phone-2', '7143437151')

  .click('#btn-submit')

  // .end()

  .catch(function(err) {
    console.error(err);
  });
