<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="erabiltzaileak">
<html>
<body>
<table border="2" rules="all" bordercolor="#000000" bgcolor="#e6e3e8" width="50%" style="text-align: center;">
<thead bgcolor="#c483f8">
  <tr>
    <th>Id</th>
    <th>Erabiltzailea</th>
  </tr>
</thead>
   <xsl:for-each select="erabiltzailea">
       <tr>
           <td>
               <xsl:value-of select="@id"/>
           </td>
           <td>
               <xsl:value-of select="izena"/>
           </td>           
       </tr>  
    </xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>