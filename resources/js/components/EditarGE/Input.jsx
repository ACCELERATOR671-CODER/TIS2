import React, { useRef } from 'react'
import { InputStyle } from '../../elementos/editarGE';
import MensajeAlerta from './MensajeAlerta';
import PropTypes from 'prop-types'

const Input = ({ estado, cambiarEstado, tipo, nombre, placeholder, regex, funcValidar }) => {

    const ref = useRef(null);
    const onChange = () => {
        cambiarEstado({
            ...estado, campo: (ref.current.value !== ' ') ?
                ref.current.value : ''
        });
    };

    const validacion = () => {
        if (regex) {
            if (regex.test(estado.campo)) {
                cambiarEstado({ ...estado, valido: 'true' });
            } else {
                cambiarEstado({ ...estado, valido: 'false' });
            }
        }
    };

    return (
        <>
            <InputStyle type={tipo}
                onChange={onChange}
                placeholder={placeholder}
                name={nombre}
                id={nombre}
                ref={ref}
                value={estado.campo}
                onBlur={validacion}
                valido={estado.valido}
                onSubmit={validacion}
            />
            {(estado.valido === 'false') && (<MensajeAlerta mensajeRep={funcValidar(estado, regex)} />)}
        </>
    )
}

Input.propTypes = {
    estado: PropTypes.object,
    cambiarEstado: PropTypes.func,
    tipo: PropTypes.string,
    nombre: PropTypes.string,
    placeholder: PropTypes.string,
    funcValidar: PropTypes.func
}

export default Input;
