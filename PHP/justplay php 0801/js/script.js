/**
 //Récupère l'attribut "key" de l'entré
 * @param {String} elem 
 */
function getKey(elem) {
    return $(elem).attr('key')
}

/**
 //Fonction de modification du modal
 * @param {string} titre 
 */
function changeModalTitre(titre) {
    $('.modal-title').html(titre);
}
function changeModalBody(titre) {
    $('.modal-body').html(titre);
}
function changeModalFooter(titre) {
    $('.modal-footer').html(titre);
}
