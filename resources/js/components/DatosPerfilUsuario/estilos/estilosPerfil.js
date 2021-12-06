import styled from "styled-components";
import { colorSecundary } from "../../../parametros/colores";

const ContenedorInvi = styled.div`
    background-color: snow;
    padding: 10px;
    margin: 20px;
    max-height: 500px;
    height: 84%;
    overflow-y: auto;
`;

const CajaInvitacion = styled.div`
    width: 100%;
    margin: 10px auto;
    display: grid;
    grid-template-columns: 0.5fr 2fr 1fr;
    border: 2px solid black;
`;

const CajaTexto = styled.div`
    min-width: 178px;
    width: 100%;
    height: 100%;
    overflow-wrap: break-word;
`;

const ImagenLogo = styled.img`
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid rgb(${colorSecundary.r},${colorSecundary.g},${colorSecundary.b})
`;

const CajaImagen = styled.div`
    width: 80px;
    height: 80px;
    margin: auto 5px;
`;

const CajaBotones = styled.div`
    width: 100%;
    height: 50%;
    padding: 10px;
    margin: auto;
`;

export {
    ContenedorInvi,
    CajaInvitacion,
    CajaTexto,
    ImagenLogo,
    CajaImagen,
    CajaBotones
};