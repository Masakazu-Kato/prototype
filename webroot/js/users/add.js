$(document).ready(function () {
  var Form = function () {
    this.vendor = $('.form-control[name=vendor_id]');
    this.group = $('.form-control[name=group_id]');
    this.init();
  };

  Form.prototype.init = function () {
      
    this.vendor.on('change', function () {
        
    });
    
    this.group.on('change', function () {
        
    });
    
  };

  new Form;
});
