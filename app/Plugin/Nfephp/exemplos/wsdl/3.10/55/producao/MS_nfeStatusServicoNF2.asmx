<?xml version="1.0" encoding="UTF-8"?>
HTTP/1.1 200 OK
Server: GlassFish Server Open Source Edition  4.0.1 
Server: grizzly/2.3.11
Content-Type: text/xml;charset=utf-8
Date: Tue, 21 Oct 2014 18:46:06 GMT
Transfer-Encoding: chunked

<?xml version='1.0' encoding='UTF-8'?><!-- Published by JAX-WS RI (http://jax-ws.java.net). RI's version is Metro/2.3.1-b259 (trunk-7770; 2013-10-30T04:04:22+0000) JAXWS-RI/2.2.9-b131029.1831 JAXWS-API/2.2.11 JAXB-RI/2.2.8-b131017.0915 JAXB-API/2.2.11 svn-revision#unknown. --><!-- Generated by JAX-WS RI (http://jax-ws.java.net). RI's version is Metro/2.3.1-b259 (trunk-7770; 2013-10-30T04:04:22+0000) JAXWS-RI/2.2.9-b131029.1831 JAXWS-API/2.2.11 JAXB-RI/2.2.8-b131017.0915 JAXB-API/2.2.11 svn-revision#unknown. --><definitions xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" xmlns:wsp="http://www.w3.org/ns/ws-policy" xmlns:wsp1_2="http://schemas.xmlsoap.org/ws/2004/09/policy" xmlns:wsam="http://www.w3.org/2007/05/addressing/metadata" xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/" xmlns:tns="http://www.portalfiscal.inf.br/nfe/wsdl/NfeStatusServico2" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.xmlsoap.org/wsdl/" targetNamespace="http://www.portalfiscal.inf.br/nfe/wsdl/NfeStatusServico2" name="NfeStatusServico2">
<types>
<xsd:schema>
<xsd:import namespace="http://www.portalfiscal.inf.br/nfe/wsdl/NfeStatusServico2" schemaLocation="https://nfe.fazenda.ms.gov.br:443/producao/services2/NfeStatusServico2?xsd=1"/>
</xsd:schema>
</types>
<message name="nfeStatusServicoNF2">
<part name="nfeDadosMsg" element="tns:nfeDadosMsg"/>
<part name="nfeCabecMsg" element="tns:nfeCabecMsg"/>
</message>
<message name="nfeStatusServicoNF2Response">
<part name="nfeStatusServicoNF2Result" element="tns:nfeStatusServicoNF2Result"/>
<part name="nfeCabecMsg" element="tns:nfeCabecMsg"/>
</message>
<portType name="NfeStatusServico2Soap">
<operation name="nfeStatusServicoNF2" parameterOrder="nfeDadosMsg nfeCabecMsg">
<input wsam:Action="http://www.portalfiscal.inf.br/nfe/wsdl/NfeStatusServico2/nfeStatusServicoNF2" message="tns:nfeStatusServicoNF2"/>
<output wsam:Action="http://www.portalfiscal.inf.br/nfe/wsdl/NfeStatusServico2/NfeStatusServico2Soap/nfeStatusServicoNF2Response" message="tns:nfeStatusServicoNF2Response"/>
</operation>
</portType>
<binding name="nfeStatusServico2Soap12Binding" type="tns:NfeStatusServico2Soap">
<soap12:binding transport="http://schemas.xmlsoap.org/soap/http" style="document"/>
<operation name="nfeStatusServicoNF2">
<soap12:operation soapAction="http://www.portalfiscal.inf.br/nfe/wsdl/NfeStatusServico2/nfeStatusServicoNF2"/>
<input>
<soap12:body use="literal" parts="nfeDadosMsg"/>
<soap12:header message="tns:nfeStatusServicoNF2" part="nfeCabecMsg" use="literal"/>
</input>
<output>
<soap12:body use="literal" parts="nfeStatusServicoNF2Result"/>
<soap12:header message="tns:nfeStatusServicoNF2Response" part="nfeCabecMsg" use="literal"/>
</output>
</operation>
</binding>
<service name="NfeStatusServico2">
<port name="nfeStatusServico2Soap12" binding="tns:nfeStatusServico2Soap12Binding">
<soap12:address location="https://nfe.fazenda.ms.gov.br:443/producao/services2/NfeStatusServico2"/>
</port>
</service>
</definitions>