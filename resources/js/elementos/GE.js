import styled from "styled-components"
import { colorPrimary, colorSecundary } from "../parametros/colores";

const GrupoTabla = styled.div`
    display: grid;

`;

const Tabla = styled.table`
    border-style: solid;
    border-color: black;
    color: black;

`; 

const THead = styled.thead`
    background-color: rgb(${colorPrimary.r}, ${colorPrimary.g}, ${colorPrimary.b});
`; 

const RowPrimary= styled.tr`
    background-color: rgb(${colorPrimary.r}, ${colorPrimary.g}, ${colorPrimary.b});
`;

const RowSecundary = styled.tr`
    background-color: rgb(${colorSecundary.r}, ${colorSecundary.g}, ${colorSecundary.b});
`

export {
    Tabla,
    THead,
    RowPrimary,
    RowSecundary,
    GrupoTabla
}