function localSetItem(key = null , value = null){
    if ( key ){
        if ( typeof key == "string"){
            window.localStorage.setItem(key , value) ;
        } else if ( typeof key == "array"){
            key.map( (key , value) => window.localStorage.setItem(key , value) ) ;
        }
        return true ;
    }
    return false ;
}

function localGetItem( key ){
    return window.localStorage.getItem(key) ;
}

function localHasItem( key ){
    return localGetItem( key ) ? true : false ;
}

function localRemoveItem( key ){
    return window.localStorage.removeItem( key ) ;
}

function showMessage( msg , onCloseFunc = null ) {
    Snackbar.show({
        text: msg ,
        pos: 'bottom-right' ,
        showAction: false ,
        duration : 4000 ,
        onClose: onCloseFunc
    });
}

export {
    localHasItem ,
    localGetItem ,
    localSetItem ,
    localRemoveItem ,
    showMessage
}