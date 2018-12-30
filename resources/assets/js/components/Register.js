import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Captcha from "./Captcha";
import Spinner from "./Spinner";

export default class Register extends Component {

    constructor(props) {
        super(props) ;
        this.state =  {
            action   : this.props.action ,
            username : null ,
            email    : null ,
            password : null ,
            captcha  : null ,
            privacy : false ,
            submitBtn : "ساخت حساب کاربری" ,
            isWorked : false ,
            errors : {} ,
            loginSuccess : false ,
        } ;
        this.register   = this.register.bind(this) ;
        this.loading = this.loading.bind(this) ;
    }


    loading(){
        return (
            <Spinner size="15"/>
        );
    }


    register(item){
        item.preventDefault() ;
        const { isWorked , submitBtn , username , password , privacy , email , captcha } = this.state ;
        if( !isWorked ){
            this.setState({
                submitBtn : this.loading() ,
                isWorked : true /* در حال کار کردنم */
            }) ;
            axios.post( this.state.action , {
                username ,
                email  ,
                captcha ,
                password ,
                privacy
            }).then( response => {
                let result =  response.data ;
                this.setState({
                    submitBtn : submitBtn ,
                    isWorked : false ,
                    errors : [] ,
                    loginSuccess : true
                });
                Snackbar.show({
                    text: result.msg ,
                    pos: 'top-center' ,
                    showAction: false ,
                });

                setTimeout( () => {
                    location.reload();
                } , 2000 );

            }).catch( response => {
                const result = response.response.data ;
                if( response.response.status == 422 )
                {
                    this.setState({
                        submitBtn : submitBtn ,
                        isWorked : false ,
                        errors : result.errors
                    });
                }
            }) ;
        }
    }


    _renderError( item ){
        if ( item != undefined ){
            return (
                item.map((value , index ) => {
                    return (
                        <p key={ index } className="text-danger text-small mt-2 btn-block">{ value }</p>
                    ) ;
                })
            );
        }
        return null ;
    }

    _renderButton(){
        const { loginSuccess } = this.state ;
        if ( loginSuccess ){
            return null ;
        }
        return (
            <div className="d-flex justify-content-between align-items-center">
                <a href="/login">قبلا اکانت ساخته بودم</a>
                <button
                    onClick={ (item) => this.register(item) }
                    className="btn btn-primary btn-lg btn-shadow"
                >{ this.state.submitBtn }</button>
            </div>
        );
    }

    render(){

        const { errors } = this.state ;

        return (
            <div>
                <label className="form-group has-float-label mb-4">
                    <input
                        autoComplete="off"
                        className="form-control"
                        onChange={ (item) => this.setState({ username : item.target.value }) } />
                    <span>نام کاربری</span>
                    { this._renderError( errors.username ) }
                </label>
                <label className="form-group has-float-label mb-4">
                    <input className="form-control" type="email" onChange={ (item) => this.setState({ email : item.target.value }) } />
                    <span>پست الکترونیکی</span>
                    { this._renderError( errors.email ) }
                </label>
                <label className="form-group has-float-label mb-4">
                    <input
                        autoComplete="off"
                        className="form-control"
                        type="password"
                        onChange={ (item) => this.setState({ password : item.target.value }) } />
                    <span>گذرواژه</span>
                    { this._renderError( errors.password ) }
                </label>
                <div className="input-group has-float-label mb-4">
                    <div className="input-group-prepend">
                        <div className="input-group-text">
                            <Captcha />
                        </div>
                    </div>
                    <input
                        className="form-control"
                        autoComplete="off"
                        onChange={ (item) => this.setState({ captcha : item.target.value }) } />
                    <span>کد امنیتی</span>
                    { this._renderError( errors.captcha ) }
                </div>
                <div className="custom-control custom-checkbox mb-4">
                    <input
                        onChange={ (item) => this.setState({
                            privacy : item.target.value ? true : false
                        })}
                        type="checkbox"
                        value="1"
                        className="custom-control-input"
                        id="privacy" />
                    <label className="custom-control-label" htmlFor="privacy">
                    <a className="text-primary" href="#">قوانین</a> رو خوندم و قبول دارم </label>
                    { this._renderError( errors.privacy ) }
                </div>
                { this._renderButton() }
            </div>
        );
    }


}

if (document.getElementById('_register')) {
    let action = document.getElementById("_register").action ;
    ReactDOM.render(
        <Register action={ action } /> ,
        document.getElementById('_register')
    );
}
