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

  .setValue('#input-email', 'namvh2504@gmail.com')
  .setValue('#input-password', '123123')

  .click('#btn-submit')

  .setValue('#input-parent-1', 'Teresa Lo')
  .setValue('#input-parent-2', 'Yin WuShuang')
  .setValue('#input-address-1', '3-4 JiangPanLou')
  .setValue('#input-address-2', 'MingCuiTaoYuan, Fuyang District')
  // .setValue('#input-email-1', '')
  .setValue('#input-email-2', '175542164@qq.com')
  .selectByValue('#input-country', '48')
  // .selectByValue('#input-state', '')
  .setValue('#input-city', 'Hangzhou, Zheijiang')
  // .setValue('#input-zipcode', '')

  .setValue('#input-phone-1', '008618857193030')
  .setValue('#input-phone-2', '008613735862568')
  .setValue('#input-phone-3', '')
  .setValue('#input-phone-4', '')
  .selectByValue('#input-phone-type-1', 'cell')
  .selectByValue('#input-phone-type-2', 'cell')
  // .selectByValue('#input-phone-type-3', '')
  // .selectByValue('#input-phone-type-4', '')

  .setValue('#input-emergency-name-1', 'Luo Cheng')
  .setValue('#input-emergency-name-2', 'Yin WuShuang')
  .setValue('#input-emergency-relationship-1', 'Friend')
  .setValue('#input-emergency-relationship-2', 'Mother')
  .setValue('#input-emergency-phone-1', '00861373-586-2568')
  .setValue('#input-emergency-phone-2', '00861373-586-2568')

  .click('#btn-submit')

  // .end()

  .catch(function(err) {
    console.error(err);
  });
