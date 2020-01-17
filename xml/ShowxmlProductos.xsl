<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>		
			<head>
				<title>VerProductosXML</title>
			</head>
			<body>
				<div id='page-wrap' align='center'>
					<header class='main' id='h1'>
						<h2>Productos con XML</h2>
						<br></br>
						<table style="border-collapse: collapse;" border='1' bgcolor="#BDFDFA">
							<tr>
								<th>Vendedor</th>
								<th>Tipo de articulo</th>
								<th>Articulo</th>
								<th>Precio</th>
								<th>Categoria</th>							
							</tr>
							<xsl:for-each select="//assessmentItems/assessmentItem">
								<tr>
									<td><xsl:value-of select="./@vendedor"/></td>
									<td><xsl:value-of select="./itemBody/p"/></td>
                                    <td><xsl:value-of select="./articulo/a"/></td>
                                    <td><xsl:value-of select="./precio/value"/></td>				
									<td><xsl:value-of select="./@categoria"/></td>
								</tr>
								<br></br>
							</xsl:for-each>
						</table>
					</header>
				</div>
			</body>	
		</html>	
	</xsl:template>
</xsl:stylesheet>