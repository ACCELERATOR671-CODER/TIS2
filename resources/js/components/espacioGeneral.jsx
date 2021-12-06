import React from 'react';
import { Card } from '../elementos/card';
import {InputStyle } from '../elementos/registro';
import { Boton} from '../elementos/tabla';
import Accordion from './Acordeon/Accordion';


const EspacioGeneral = () => {

    return(
        <main>
            <Card>
                    <div id="cont-label-logo">
                        <label id="label-login-logo">ESPACIO GENERAL</label>
                    </div>
                    <Accordion/>
            </Card>  
            
        </main>
    );

    

};

export default EspacioGeneral;