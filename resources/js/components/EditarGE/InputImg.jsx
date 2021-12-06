import { useRef, useState } from 'react'
import { InputImagen } from '../../elementos/editarGE'
import PropTypes from 'prop-types'
import MensajeAlerta from './MensajeAlerta';
import { isNull } from 'lodash';

const InputImg = ({ name, estado, cambiarEstado, funcValidar }) => {
    const imagenCarg = useRef(null);
    if (estado.campo == '') {
        cambiarEstado({ ...estado, campo: "./resources/logoDefecto.png" });
    }
    const onButtonClick = (e) => {
        const img = document.getElementById('imagenGER')
        const files = imagenCarg.current.files;

        if (!files || !files.length) {
            img.src = estado.campo;
            cambiarEstado({ valido: 'false' });
            return;
        }
        cambiarEstado({ valido: 'true' })
        const image = files[0];
        const url = URL.createObjectURL(image);
        console.log(url);
        img.src = url;
    }

    return (
        <>
            <img id='imagenGER' className='mb-2' src={estado.campo} alt="" />
            <InputImagen id={name}
                name={name}
                ref={imagenCarg}
                onSubmit={onButtonClick}
                onChange={onButtonClick}
                accept="image/jpeg,image/jpg,image/png"
                type='file' />
            {(estado.valido === 'false') && (<MensajeAlerta mensajeRep={funcValidar(estado)} />)}
        </>);
};

InputImg.prototype = {
    name: PropTypes.string,
    estado: PropTypes.object,
    cambiarEstado: PropTypes.func,
    funcValidar: PropTypes.func
};

export default InputImg;
