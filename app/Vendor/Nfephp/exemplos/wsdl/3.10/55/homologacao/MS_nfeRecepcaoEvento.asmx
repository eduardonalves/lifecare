<?xml version="1.0" encoding="UTF-8"?>
HTTP/1.1 200 OK
Server: GlassFish Server Open Source Edition  4.1 
Server: grizzly/2.3.15
Content-Type: text/xml;charset=utf-8
Date: Tue, 21 Oct 2014 18:46:02 GMT
Transfer-Encoding: chunked

<?xml version='1.0' encoding='UTF-8'?><!-- Published by JAX-WS RI (http://jax-ws.java.net). RI's version is Metro/2.3.1-b419 (branches/2.3.1.x-7937; 2014-08-04T08:11:03+0000) JAXWS-RI/2.2.10-b140803.1500 JAXWS-API/2.2.11 JAXB-RI/2.2.10-b140802.1033 JAXB-API/2.2.12-b140109.1041 svn-revision#unknown. --><!-- Generated by JAX-WS RI (http://jax-ws.java.net). RI's version is Metro/2.3.1-b419 (branches/2.3.1.x-7937; 2014-08-04T08:11:03+0000) JAXWS-RI/2.2.10-b140803.1500 JAXWS-API/2.2.11 JAXB-RI/2.2.10-b140802.1033 JAXB-API/2.2.12-b140109.1041 svn-revision#unknown. --><definitions xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" xmlns:wsp="http://www.w3.org/ns/ws-policy" xmlns:wsp1_2="http://schemas.xmlsoap.org/ws/2004/09/policy" xmlns:wsam="http://www.w3.org/2007/05/addressing/metadata" xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/" xmlns:tns="http://www.portalfiscal.inf.br/nfe/wsdl/RecepcaoEvento" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.xmlsoap.org/wsdl/" targetNamespace="http://www.portalfiscal.inf.br/nfe/wsdl/RecepcaoEvento" name="RecepcaoEvento">
<types>
<xsd:schema>
<xsd:import namespace="http://www.portalfiscal.inf.br/nfe/wsdl/RecepcaoEvento" schemaLocation="https://homologacao.nfe.ms.gov.br:443/homologacao/services2/RecepcaoEvento?xsd=1"/>
</xsd:schema>
</types>
<message name="nfeRecepcaoEvento">
<part name="nfeDadosMsg" element="tns:nfeDadosMsg"/>
<part name="nfeCabecMsg" element="tns:nfeCabecMsg"/>
</message>
<message name="nfeRecepcaoEventoResponse">
<part name="nfeRecepcaoEventoResult" element="tns:nfeRecepcaoEventoResult"/>
<part name="nfeCabecMsg" element="tns:nfeCabecMsg"/>
</message>
<portType name="RecepcaoEventoSoap">
<operation name="nfeRecepcaoEvento" parameterOrder="nfeDadosMsg nfeCabecMsg">
<input wsam:Action="http://www.portalfiscal.inf.br/nfe/wsdl/RecepcaoEvento/nfeRecepcaoEvento" message="tns:nfeRecepcaoEvento"/>
<output wsam:Action="http://www.portalfiscal.inf.br/nfe/wsdl/RecepcaoEvento/RecepcaoEventoSoap/nfeRecepcaoEventoResponse" message="tns:nfeRecepcaoEventoResponse"/>
</operation>
</portType>
<binding name="recepcaoEventoSoap12Binding" type="tns:RecepcaoEventoSoap">
<soap12:binding transport="http://schemas.xmlsoap.org/soap/http" style="document"/>
<operation name="nfeRecepcaoEvento">
<soap12:operation soapAction="http://www.portalfiscal.inf.br/nfe/wsdl/RecepcaoEvento/nfeRecepcaoEvento"/>
<input>
<soap12:body use="literal" parts="nfeDadosMsg"/>
<soap12:header message="tns:nfeRecepcaoEvento" part="nfeCabecMsg" use="literal"/>
</input>
<output>
<soap12:body use="literal" parts="nfeRecepcaoEventoResult"/>
<soap12:header message="tns:nfeRecepcaoEventoResponse" part="nfeCabecMsg" use="literal"/>
</output>
</operation>
</binding>
<service name="RecepcaoEvento">
<port name="recepcaoEventoSoap12" binding="tns:recepcaoEventoSoap12Binding">
<soap12:address location="https://homologacao.nfe.ms.gov.br:443/homologacao/services2/RecepcaoEvento"/>
</port>
</service>
</definitions>