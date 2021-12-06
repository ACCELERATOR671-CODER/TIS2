import React, {useState, useEffect, useRef} from 'react'
import "./Accordion.css"
import Chevron from './chevron.svg'

export default function Accordion() {

    const [toggle, setToggle] = useState(false)
    const [heightEl, setHeightEl] = useState();

    const refHeight = useRef()

    useEffect(() => {
        console.log(refHeight);
        setHeightEl(`${refHeight.current.scrollHeight}px`)
    }, [])

    const toggleState = () => {
        setToggle(!toggle)
    }

    console.log(toggle);
    return (
        <div className="accordion">

            <button 
            onClick={toggleState}
            className="accordion-visible">
                <span>DESCRIPCION</span>
                <img 
                className={toggle && "active"}
                src={Chevron} />
            </button>
            
            <div 
            className={toggle ? "accordion-toggle animated" : "accordion-toggle"}
            style={{height: toggle ? `${heightEl}` : "0px"}}
            ref={refHeight}
            >   

                <p aria-hidden={toggle ? "true" : "false"}>
                <textarea name="mensaje" placeholder="Ingresa una Descripcion de la empresa TIS" maxlength="140"></textarea>
                </p>
            </div>

            <button 
            onClick={toggleState}
            className="accordion-visible">
                <span>ANUNCIOS</span>
                <img 
                className={toggle && "active"}
                src={Chevron} />
            </button>
            
            <div 
            className={toggle ? "accordion-toggle animated" : "accordion-toggle"}
            style={{height: toggle ? `${heightEl}` : "0px"}}
            ref={refHeight}
            >   
            
                <p margin-left = '0px' aria-hidden={toggle ? "true" : "false"}>
                    <div border="1px solid #71caac"> 
                        <p>Aqui se introduce los anuncios</p>
                        <button>Agregar</button>
                    </div>
                </p>
            </div>

            <button 
            onClick={toggleState}
            className="accordion-visible">
                <span>DOCUMENTACION</span>
                <img 
                className={toggle && "active"}
                src={Chevron} />
            </button>
            
            <div 
            className={toggle ? "accordion-toggle animated" : "accordion-toggle"}
            style={{height: toggle ? `${heightEl}` : "0px"}}
            ref={refHeight}
            >   
                <div border="1px solid #71caac"> 
                        <p>Aqui se introduce los Documentos</p>
                        <button>Agregar</button>
                    </div>
                
            </div>
        </div>
    )
}