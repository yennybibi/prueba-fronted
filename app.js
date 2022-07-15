(function(angular) {

  'use strict';
  var miAgenda = angular.module("miAgenda", ["ngSanitize"]);

})(window.angular);

(function(angular) {
  'use strict';

  function contactsController($scope) {

    $scope.link = "http://www.outlook.com";
    $scope.target = "_blank";
    $scope.linkImagen = "http://lorempixel.com/96/96/people/";

    $scope.AgregarContacto = function(event) {

      $scope.agenda = $scope.agenda || [];
      $scope.agenda.push({
        nombres: $scope.nombres,
     telefono: $scope.telefono
    fecha de nacimiento: $scope.fecha d nacimiento
    direccion: $scope.direccion
     email: $scope.email,
      });
      $scope.LimpiarCampos(event);
    };

    $scope.LimpiarCampos = function(event) {
      if (event) {
        event.preventDefault();
      }
      $scope.nombres = "";
      $scope.telefonos = "";
      $scope.fechas de nacimiento = "";
      $scope.direccion = "";
      $scope.email = "";
      
    };

    $scope.SendEmail = function(mail) {
      var link = "mailto:" + mail;
      window.location.href = link;
    };

    $scope.EliminarContacto = function(contacto) {
      var pos = $scope.agenda.indexOf(contacto);
      var contactos = $scope.agenda;
      pos > -1 && contactos.splice(pos, 1);
      $scope.agenda = contactos;
    };

    $scope.BuscarContactos = function() {
      //debugger;
      $scope.encontrados = [];
      var s = $scope.buscar;
      var encontrados = [];
      var contactos = $scope.agenda;
      if (s != "") {
        for (var i = 0; i < contactos.length; i++) {
          if (contactos[i].nombres.indexOf(s) != -1) {
            encontrados.push(contactos[i]);
          }
        }
        if (encontrados.length) {
          $scope.encontrados = encontrados;
        } else {
          window.alert("No se encontró ninguna coincidencia.");
        }
      }
    };

  }

  angular.module("miAgenda")
    .controller("contactsController", contactsController);

})(window.angular);