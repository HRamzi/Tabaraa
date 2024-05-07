// Votre propre script JavaScript pour l'administration

$(document).ready(function () {
    // Activation des tooltips Bootstrap
    $('[data-toggle="tooltip"]').tooltip();

    // Affichage des modals de confirmation de suppression
    $('.delete-btn').click(function () {
        $('#deleteModal').modal('show');
    });

    // Fermeture des modals de confirmation de suppression
    $('#cancelDelete').click(function () {
        $('#deleteModal').modal('hide');
    });

    // Affichage des modals de confirmation de modification de rôle
    $('.change-role-btn').click(function () {
        var userId = $(this).data('user-id');
        $('#userId').val(userId);
        $('#roleModal').modal('show');
    });

    // Fermeture des modals de confirmation de modification de rôle
    $('#cancelRoleChange').click(function () {
        $('#roleModal').modal('hide');
    });

    // Affichage des modals de confirmation de suppression d'annonce
    $('.delete-ad-btn').click(function () {
        var adId = $(this).data('ad-id');
        $('#adId').val(adId);
        $('#deleteAdModal').modal('show');
    });

    // Fermeture des modals de confirmation de suppression d'annonce
    $('#cancelAdDelete').click(function () {
        $('#deleteAdModal').modal('hide');
    });
});
