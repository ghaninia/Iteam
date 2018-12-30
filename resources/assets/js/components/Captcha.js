import React from "react" ;

export default class Captcha extends React.Component {

    constructor(props){
        super(props) ;
        this.state = {
            url : "/captcha"
        } ;
        this.reload = this.reload.bind(this) ;
    }

    _randomInt(){
        return Math.floor( Math.random() * 1000 )
    }

    reload(){
        NProgress.start() ;
        let { url } = this.state ;
        let link = url.split("?") ;
        link = link[0] + `?${ this._randomInt() }` ;
        this.setState({
            url : link
        }) ;
        NProgress.done() ;
    }

    render() {
        return (
            <div className="captcha">
                <div className="reloadcaptcha" onClick={ this.reload }></div>
                <img src={ this.state.url } alt="کد امنیتی"/>
            </div>
        );
    }
}