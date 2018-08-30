$(document).ready(function () {
  var Form = function () {
    this.deleteButton = $('.action-button *[name=delete]');
    this.init();
  };

  Form.prototype.init = function () {
    this.deleteButton.on('click', function () {
      if (confirm('削除してもよろしいですか？')) {

      }
    });
  };

  Form.prototype.delete = function () {
  };

  new Form;
});
